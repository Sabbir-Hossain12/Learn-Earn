@extends('Frontend.layouts.master')

@push('css')
    <style>
        .question-card {
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .question-card .votes i {
            cursor: pointer;
            color: #666;
        }

        .question-card .votes i:hover {
            color: #0d6efd;
        }

        .answers {
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        .answers .answer {
            padding: 10px 0;
            border-bottom: 1px solid #f1f1f1;
        }

        .answers .answer:last-child {
            border-bottom: none;
        }
    </style>

@endpush

@section('content')

    <div class="container my-5">

        <h2 class="mb-4">Student Q&A Forum</h2>

        <!-- Ask Question Button -->
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#askQuestionModal">
            Ask a Question
        </button>

        <!-- Questions List -->
        <div id="questionsList">
            @forelse($questions as $question)
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
            @empty
                <p>No questions yet. Be the first to ask!</p>
            @endforelse
        </div>

    </div>

    <!-- Ask Question Modal -->
    <div class="modal fade" id="askQuestionModal" tabindex="-1" aria-labelledby="askQuestionModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="askQuestionForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="askQuestionModalLabel">Ask a Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="questionTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="questionTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="questionContent" class="form-label">Question</label>
                            <textarea class="form-control" id="questionContent" name="content" rows="4"
                                      required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Post Question</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            // Submit new question via AJAX
            $('#askQuestionForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('community-question.store') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function (res) {
                        if (res.status === 'success') {
                            $('#questionsList').prepend(res.html); // prepend new question card
                            $('#askQuestionModal').modal('hide');
                            $('#askQuestionForm')[0].reset();
                        }
                    }
                });
            });

            // Toggle answers
            $(document).on('click', '.view-answers-btn', function () {
                let card = $(this).closest('.question-card');
                let answersDiv = card.find('.answers');
                let questionId = card.data('id');

                if (answersDiv.is(':visible')) {
                    answersDiv.slideUp();
                } else {
                    $.ajax({
                        url: '/questions/' + questionId + '/answers',
                        method: 'GET',
                        success: function (res) {
                            answersDiv.html(res.html).slideDown();
                        }
                    });
                }
            });


        });
    </script>
@endpush
