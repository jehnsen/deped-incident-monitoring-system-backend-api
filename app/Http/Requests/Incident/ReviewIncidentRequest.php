<?php

namespace App\Http\Requests\Incident;

use Illuminate\Foundation\Http\FormRequest;

class ReviewIncidentRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            // optional status transition (keep your allowed values)
            'status'           => ['sometimes','string','in:Draft,Under Review,Approved,Rejected,Resolved'],
            // the decision selected in the UI
            'review_decision'  => ['required','string','in:Pending,Approved,Needs Revision,Escalated,Rejected'],
            'review_comments'  => ['nullable','string','max:2000'],
            // allow override for service accounts (defaults to auth user below)
            'reviewed_by_user_id' => ['sometimes','nullable','exists:users,id'],
            'reviewed_at'      => ['sometimes','nullable','date'],
        ];
    }
}
