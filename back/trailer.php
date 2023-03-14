<h3 class="ct">預告片清單</h3>
<form action="./api/edit_trailer.php" method="post">
    <div style="max-height:350px;overflow: scroll;">
        <table>
            <tr>
                <td>預告片海報</td>
                <td>預告片片名</td>
                <td>預告片排序</td>
                <td>操作</td>
            </tr>
            <?php
            $ts = $Trailer->all(" Order by `rank`");
            foreach ($ts as $key => $t) {
                $checked = ($t['sh'] == 1) ? 'checked' : '';
                $prev=($key==0)?$t['id']:$ts[$key-1]['id'];
                $next=($key==count($ts)-1)?$t['id']:$ts[$key+1]['id'];
            ?>
                <tr>
                    <td><img src="./upload/<?= $t['img']; ?>" alt="" width="20px"></td>
                    <td><input type="text" name="name[]" value="<?= $t['name']; ?>"></td>
                    <td>
                        <input type="button" value="往上" onclick="sw('Trailer',<?=$t['id']?>,<?=$prev;?>)">
                        <input type="button" value="往下" onclick="sw('Trailer',<?=$t['id']?>,<?=$next;?>)">
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?= $t['id'] ?>" <?= $checked ?>>&nbsp;
                        <input type="checkbox" name="del[]" value="<?= $t['id'] ?>">&nbsp;
                        <select name="ani[]" id="">
                            <option value="1" <?= ($t['ani'] == 1) ? 'selected' : ''; ?>>淡入淡出</option>
                            <option value="2" <?= ($t['ani'] == 2) ? 'selected' : ''; ?>>滑入滑出</option>
                            <option value="3" <?= ($t['ani'] == 3) ? 'selected' : ''; ?>>縮放</option>
                        </select>
                        <input type="hidden" name="id[]" value="<?= $t['id'] ?>">
                    </td>
                </tr>



            <?php
            } ?>
        </table>
    </div>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>
<hr>
<h3>新增預告片海報</h3>
<form action="./api/add_trailer.php" method="post" enctype="multipart/form-data">
    <div>預告片海報:<input type="file" name="img" id=""></div><br>
    <div>預告片片名:<input type="text" name="name" id=""></div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>


</form>

<script>
function sw(table,id,id2){
$.post("api/sw.php",{table,id,id2},(res)=>{
    location.reload()
    console.log(res);
})
} 

</script>