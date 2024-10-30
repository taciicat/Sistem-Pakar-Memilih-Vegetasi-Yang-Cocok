<div class="page-header">
    <h1>Rule</h1>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Rule</th>
            </tr>
        </thead>
        <?php
        $rules = get_relasi(array());
        $no = 1;
        foreach ($rules as $kode_sayuran => $val) :
            $rule = array();
            foreach ($val as $kode_tanah => $v) {
                $rule[] = '<span class="text-danger">' . $TANAH[$kode_tanah] . '</span>';
            }
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><strong>IF</strong> <?= implode('<br />&nbsp; &nbsp; &nbsp;<strong>AND</strong> ', $rule) ?> <br /><strong>THEN</strong> <span class="text-primary"><?= $SAYURAN[$kode_sayuran]->nama_sayuran ?></span></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>