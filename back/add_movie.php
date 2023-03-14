<h3 class="ct">新增院線片</h3>
<form action="api/add_movie.php" method="post" enctype="multipart/form-data">
    <div style="display: flex;justify-items:center;flex-wrap:wrap;" class="ct">
        <div style="width: 20%;">影片資料</div>
        <table width="78%">
            <tr>
                <td>片名:</td>
                <td><input type="text" name="name" id=""></td>
            </tr>
            <tr>
                <td>分級:</td>
                <td>
                    <select name="level" id="">
                        <option value="1">普遍級</option>
                        <option value="2">保護級</option>
                        <option value="3">輔導級</option>
                        <option value="4">限制級</option>
                    </select>(請選擇分級)
                </td>
            </tr>
            <tr>
                <td>片長:</td>
                <td><input type="number" name="length" id="">分鐘</td>
            </tr>
            <tr>
                <td>上映日期:</td>
                <td><input type="date" name="ondate" id=""></td>
            </tr>
            <tr>
                <td>發行商:</td>
                <td><input type="text" name="publish" id=""></td>
            </tr>
            <tr>
                <td>導演:</td>
                <td><input type="text" name="director" id=""></td>
            </tr>
            <tr>
                <td>預告影片:</td>
                <td><input type="file" name="trailer" id=""></td>
            </tr>
            <tr>
                <td>電影海報:</td>
                <td><input type="file" name="poster" id=""></td>
            </tr>
        </table>
        <div style="width: 20%;">劇情簡介</div>
        <textarea name="intro" id="" cols="30" rows="10" style="width:58%;height:50px;"></textarea>
    </div>
    <br>
<div class="ct">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>