

var postid=0;
var postBodyElemets =null;
$(".interaction").find('.edit').on('click',function(event)
{
    postBodyElemets = event.target.parentNode.parentNode.childNodes[1];
    var text = postBodyElemets.textContent;
    postid =  event.target.parentNode.parentNode.dataset['postid'];
   $("#post-body").val(text);
   $("#editPost").modal();
});


$("#updatepost").on('click',function () {

    $.ajax({
        type:"POST",
        url:url,
        data:{body: $("#post-body").val(), postid:postid, _token:token}
   }).done(function (msg){
        console.log(JSON.stringify(msg));
        $(postBodyElemets).text(msg['new_body']);
        $("#editPost").modal('hide');
            //postBodyElemets.textContent = msg['new_body'];

    });

});