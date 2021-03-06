<?= form_open('#') . form_close() ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php $var = 'period'; ?>
                    <label>Periode</label>
                    <select id="bperiod" name="<?= $var; ?>" class="custom-select">
                        <option>Pilih</option>
                        <?php foreach ($period as $k => $v): ?>
                        <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= $has_error = (form_error($var)) ? '<div class="invalid-feedback">' . form_error($var) . '</div>' : '' ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <?php $var = 'grade_period'; ?>
                    <label>Kelas</label>
                    <select id="bgrade" name="<?= $var; ?>" class="custom-select">
                        <option>Pilih</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fContent" class="card mg-t-10 d-none">
    <div class="card-header tx-medium d-flex align-items-center justify-content-between">
        <span id="hContent" >Daftar Siswa</span>
        <div class="d-flex align-items-center tx-18">
            <a href="#" id="bCloseAddForm" class="link-03 lh-0"><i class="icon ion-md-close"></i></a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div id="dContent" class="col">
            </div>
        </div>
    </div>
</div>