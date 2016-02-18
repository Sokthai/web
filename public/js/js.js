/**
 * Created by Allen on 1/16/2016.
 */
var chk = document.getElementsByName('checked');
var indexID = document.getElementsByName('id');

function deletes(){
    var id = 0;
    var i = chk.length - 1;

    //window.location.href = "{{route('books.index'}}";

    while (i >= 0){

        if (chk[i].checked == true){ //if true
            id = id + '-' + indexID[i].value;
        }
        i -= 1;

    }

    if (id == 0){
        window.alert('Please select any item to delete');
    }else{
        if (confirm('Are you sure you want to delete the selected record(s)?')){ //if user click confirm
            var arrID = id.split('-');
            var j = arrID.length - 1;
            while (j > 0){
                window.location="/delete/" + arrID[j];
                //window.alert(arrID[i]);
                j--;
            }

            window.location="books";
        }

    }
}

function search(){
    window.alert('this is a search');
}

