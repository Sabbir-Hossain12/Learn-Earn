<div class="card mb-3 question-card" data-id="{{ $question->id }}">
            <div class="card-body">
                <h5 class="card-title">{{ $question->title }}</h5>
                <p class="card-text text-muted">Asked by: {{ $question->user->name }}
                    | {{ $question->created_at->diffForHumans() }}</p>

                <!-- Buttons -->
                <button class="btn btn-sm btn-outline-primary view-answers-btn">View Answers</button>
                <span class="ms-3 votes">
                            <i class="bi bi-hand-thumbs-up upvote-btn" data-id="{{ $question->id }}"></i>
                        </span>

                <!-- Answers will load here -->
                <div class="answers mt-3" style="display:none;"></div>
            </div>
</div>

