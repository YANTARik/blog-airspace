<div class="testimonial-carousel text-center">
    <div  class="testimonial-slider owl-carousel">

        @foreach($comments as $comment)
            <div>
                <i class="ion-quote"></i>
                <p>{{$comment->text}}</p>
                <div class="user">
                    <img src="{{$comment->author->getAvatar()}}" alt="Pepole">
                    <p><span>{{$comment->author->name}}</span> CEO-Themefisher</p>
                </div>
            </div>
        @endforeach

    </div>
</div>