<center>
    <div class="col-md-8" style="text-align: left; margin-top: 20px;">
        <div class="card HeadChatAdmin">
            <div class="card-header">
                {{ $forum->user->name }}
                <hr>
                <p>{{ $forum->content }}</p>
            </div>
            <div class="card-body message-box" wire:poll.10ms="mount" style="overflow:auto">
                @if($forum->comments->count() == 0 )
                    No messages to show
                @else
                    @foreach($forum->comments as $comment)
                    <div class="single-message @if($comment->idParticipant !== auth()->id()) received @else sent @endif">
                        <p class="font-weight-bolder my-0">{{ $comment->user->name }}</p>
                        {{ $comment->content }}
                        <br><small class="text-muted w-100">Sent <em>{{ $comment->created_at }}</em></small>
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="card-footer">
                @if(Auth::check())
                <form wire:submit.prevent="SendComment">
                    <div class="row">
                        
                        <div class="col-md-8">
                            <input wire:model="comment" class="form-control input shadow-none FieldMessage d-inline-block" placeholder="Type a message" required>
                        </div>

                        <div class="col-md-4">
                            <button wire:click="getUser(test)" class="btn btn-primary d-inline-block ButtonSend"><i class="far fa-paper-plane"></i> Send</button>
                        </div>
                    </div>
                </form>
                @else
                <center>
                <a class="btn btn-primary" href="/login" role="button" style="padding: 1% 23% 1% 23%;">Login</a>
                <a class="btn btn-primary" href="/register" role="button" style="padding: 1% 20% 1% 20%;">Register</a>
                </center>
                @endif
            </div>
        </div>
    </div>
</center>