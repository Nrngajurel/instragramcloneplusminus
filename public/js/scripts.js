
const userId= document.getElementById('userId');
const follow= document.getElementById('follow');
let followstatus= follow.value;
if(followstatus){
    follow.innerText='Unfollow';
}

function followHandle(e){

    axios.get('/follow/'+userId.value)
        .then(function (response) {
            followstatus= !followstatus;
            e.innerText= followstatus?"Unfollow":"Follow";
        })
        .catch(function (error) {
            if(error.response.status==401){
                window.location= '/login';
            }
        });

}