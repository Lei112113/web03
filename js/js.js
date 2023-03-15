
function sw(table,id,id2){
$.post("api/sw.php",{table,id,id2},(res)=>{
    location.reload()
    console.log(res);
})
} 

function del(table,id){
    let chk=confirm('是否確定要刪除')
    if(chk){
        $.post("api/del.php",{table,id},(res)=>{
            location.reload()
            // console.log(res);
        })

    }
}

function showMovie(id){
    $.post("api/sh_movie.php",{id},(res)=>{
    location.reload()
    console.log(res);
})
}


