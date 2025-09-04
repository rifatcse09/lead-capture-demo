<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Http\Requests\LeadRequest;
use App\Http\Requests\LeadIndexRequest;
use Illuminate\Support\Facades\Log;

/**
 * Class LeadController
 *
 * Handles lead-related operations such as creation, storage, and listing.
 */
class LeadController extends Controller
{
    /**
     * Show the lead creation form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('lead-form');
    }

    /**
     * Store a new lead in the database.
     *
     * @param LeadRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LeadRequest $request)
    {
        $data = $request->validated();

        // Save lead
        $lead = Lead::create($data + ['created_at' => now()]);

        // Task C: Tracker log (audit trail)
        Log::channel('tracker')->info('lead_captured', [
            'id'   => $lead->id,
            'payload' => $data,
            'ip'   => $request->ip(),
            'ua'   => $request->userAgent(),
            'ts'   => now()->toISOString(),
        ]);

        return redirect()->route('admin.index')
            ->with('ok', 'Lead saved.');
    }

    /**
     * Display a paginated list of leads.
     *
     * @param LeadIndexRequest $request
     * @return \Illuminate\View\View
     */
    public function index(LeadIndexRequest $request)
    {
        // EFFICIENCY:
        // To improve performance, we use pagination to limit the number of records fetched at once.
        // Additionally, we ensure the `created_at` column is indexed in the database to avoid full table scans
        // when sorting or filtering by this column.

        $q = Lead::query();

        if ($email = $request->validated()['email'] ?? null) {
            $q->where('email', 'like', "%{$email}%");
        }

        $leads = $q->orderByDesc('created_at')->paginate(50);

        return view('admin', compact('leads'));
    }
}
