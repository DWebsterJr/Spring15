//ajax setup
$(document).ready(function() {
    $.ajaxSetup({
        url: 'ajaxvote.php',
        type: 'POST',
        cache: 'false'
    });

    //any voting button(up/down) clicked event
    $('.vote').click(function() {
        var self = $(this); //cache this
        var action = self.data('action'); // grab action data up/down
        var parent = self.parent().parent(); // grab grand paret .item
        var postid = parent.data('postid'); //grab post id from data-postid
        var score = parent.data('score'); // grab score from data-score
        var user = parent.data('user'); //grab user id from data-user

        //only works where is no disabled class

        if (!parent.hasClass('.disabled')) {
            //vote up action
            if (action == 'up') {

                parent.find('.vote-score').html(++score).css({
                    'color': 'green'
                });
                //change vote up button color to green
                self.css({
                    'color': 'green'
                });
                //send ajax request with post id & action
                $.ajax({
                    data: {
                        'postid': postid,
                        'action': 'up',
                        'user' : user
                    }
                });
            } else if (action == 'down') {
                //decrease vote score and color to red
                parent.find('.vote-score').html(--score).css({
                    'color': 'red'
                });
                //change vote button color to red
                self.css({
                    'color': 'red'
                });
                //send ajax request
                $.ajax({
                    data: {
                        'postid': postid,
                        'action': 'down',
                        'user': user
                    }
                });
            };
            parent.addClass('.disabled');
        };
    });
});