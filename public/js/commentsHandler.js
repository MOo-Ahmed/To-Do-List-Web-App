
function loadComments(id) {
    //var id = parseInt(document.getElementById('task_id').value);
    var url = "comments/" + id;
    $.get(url, function (result) {
        var comments = result;
        designComments(comments, id);

    });
}

function designComments(comments, id) {
    var modal_body = document.getElementById('commentsModalBody');
    if (modal_body.contains(document.getElementById('commentTable' + id))) {
        return;
    }
    else {
        modal_body.innerHTML = '';
        var n = comments.length;
        if (n == 0) {
            var p = document.createElement('p');
            p.innerHTML = 'No comments yet';
            modal_body.appendChild(p);
            return;
        }
        var table = document.createElement('table');
        table.setAttribute('id', 'commentTable' + id);
        table.className = "table table-hover";

        var thead = document.createElement('thead');
        var tr = document.createElement('tr');
        var th = document.createElement('th');
        th.scope = "col";
        th.innerHTML = 'Comments';
        var tbody = document.createElement('tbody');

        tr.appendChild(th);
        thead.appendChild(tr);
        table.appendChild(thead);
        table.appendChild(tbody);
        for (var i = 0; i < n; i++) {
            var tr2 = document.createElement('tr');
            var th2 = document.createElement('th');
            th2.scope = "row";
            th2.innerHTML = i + 1;

            var td = document.createElement('td');
            td.innerHTML = comments[i]['description'];

            tbody.appendChild(tr2);
            tbody.appendChild(th2);
            tbody.appendChild(td);
        }
        modal_body.appendChild(table);
    }
}

function addComment(d, t) {
    $.ajax({
        data: {description:d,task_id:t},
        url: '/comments/add',
        type: 'POST',
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function(response){
            console.log(response);
        }
    })
}