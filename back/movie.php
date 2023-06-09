<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div style="overflow-y:auto ;max-height:500px;">
    <?php
    $rows = $Movie->all(" order by `rank`");
    foreach ($rows as $key => $row) {
        $prev = ($key == 0) ? $row['id'] : $rows[$key - 1]['id'];
        $next = ($key == count($rows) - 1) ? $row['id'] : $rows[$key + 1]['id'];
    ?>
        <div style="display: flex;margin-top:10px auto;align-items:center ">
            <div width="15%" style="padding:2px;"><img src="./upload/<?= $row['poster'] ?>" width="80px"></div>
            <div width="15%" style="padding:2px;"><img src="./icon/03C0<?= $row['level'] ?>.png"></div>
            <div style="width:70%;">
                <div style="display: flex;justify-content:space-between;">
                    <div>片名:<?= $row['name']; ?></div>
                    <div>片長:<?= $row['length']; ?></div>
                    <div>上映時期:<?= $row['ondate']; ?></div>
                </div>
                <div>
                    <button onclick="showMovie(<?= $row['id'] ?>)"><?= ($row['sh'] == 1) ? '顯示' : '隱藏'; ?></button>
                    <button onclick="sw('Movie',<?= $row['id'] ?>,<?= $prev; ?>)">往上</button>
                    <button onclick="sw('Movie',<?= $row['id'] ?>,<?= $next; ?>)">往下</button>
                    <button onclick="location.href='?do=edit_movie&id=<?=$row['id']?>'">編輯電影</button>
                    <button onclick="del('Movie',<?=$row['id']?>)">刪除電影</button>
                </div>
                <div>
                    劇情介紹:<?=$row['intro'];?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
