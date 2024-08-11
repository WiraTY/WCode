<?= $this->extend('siswa/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid site-footer">

  <div>
    <p>
      <a href="<?= base_url('siswa/materi') ?>" style="color: white;">Materi</a>
      <span class="mx-2" style="color: white;">/</span>
      <a href="<?= base_url('siswa/materi/topik/' . $id_materi) ?>" style="color: white;"><?= $materis['nama_materi']; ?></a>
      <span class="mx-2" style="color: white;">/</span>
      <span><?= $topiks['nama_topik']; ?></span>
    </p>
  </div>

  <div class="card">
    <div class="card-body p-4 mx-auto">
      <a href="<?= base_url('siswa/materi/penjelasan/' . $id_materi . '/' . $id_topik); ?>" class="btn btn-outline-primary m-1">Penjelasan</a>
      <a href="<?= base_url('siswa/materi/praktik/'  . $id_materi . '/' . $id_topik); ?>" class="btn btn-outline-secondary m-1 active">Praktik</a>
      <a href="<?= base_url('siswa/materi/kuis/' . $id_materi . '/' . $id_topik); ?>" class="btn btn-outline-success m-1">Kuis</a>
    </div>
  </div>

  <!--  Row 1 -->
  <div class="card">
    <div class="card-body p-4 mx-auto" style="height: 50vh">
      <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
        <div class="mb-3 mb-sm-0">
          <div class="w-full flex items-center h-20" id="buttons">
            <button id="btnRun" type="button" class="btn btn-primary">Run</button>
            <input type="checkbox" id="btnLive" class="mr-1" />
            <i class="fa-solid fa-clock-rotate-left fa-2x mr-2"></i><span class="uppercase">Live</span>
            <button id="btnReset" type="button" class="btn btn-danger">Reset</button>
          </div>
        </div>
      </div>
      <div id="editor"><textarea name="asdw" id="" cols="30" rows="10"><?= $topiks['code']; ?></textarea></div>

      <iframe></iframe>
    </div>
  </div>
  <div class="card">
    <div class="card-body p-0 mx-start">
      <div class="col-md-6 p-2 justify-content-between" style="width: 100%; height: 50vh">
        <iframe id="output" sandbox="allow-scripts allow-same-origin" style="flex: 1; width: 100%; height: 50vh; border: none;"></iframe>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/ace-builds/src/ace.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/ace-builds/src/ext-language_tools.js') ?>"></script>
<script>
  btnReset = document.getElementById('btnReset');
  btnRun = document.getElementById('btnRun');
  btnLive = document.getElementById('btnLive');
  iframe = document.getElementById('output');

  ace.require('ace/ext/language_tools');
  var editor = ace.edit("editor");
  editor.setTheme("ace/theme/monokai");
  editor.session.setMode("ace/mode/html");
  editor.setOptions({
    fontSize: "14px",
    enableBasicAutocompletion: true,
    enableSnippets: true,
    enableLiveAutocompletion: true
  });

  btnReset.addEventListener('click', function() {
    editor.setValue('');
    iframe.src = '';
  });

  btnRun.addEventListener('click', function() {
    getValueAndDisplay();
  });

  // ceck if button is checked
  btnLive.addEventListener('change', function() {
    if (btnLive.checked) {
      editor.session.on('change', function(delta) {
        console.log(delta);
        getValueAndDisplay();
      });
    }
  });

  function getValueAndDisplay() {
    const text = editor.getValue();
    iframe.src = 'data:text/html;charset=utf-8,' + encodeURI(text);
  }
</script>

<?= $this->endSection('content'); ?>