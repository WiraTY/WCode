<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

  <div>
    <p>
      <a href="<?= base_url('admin/materi') ?>">Materi</a>
      <span class="mx-2">/</span>
      <a href="<?= base_url('admin/materi/topik/' . $id_materi) ?>"><?= $materis['nama_materi']; ?></a>
      <span class="mx-2">/</span>
      <span><?= $topiks['nama_topik']; ?></span>
    </p>
  </div>

  <div class="container-fluid">
    <div class="col-lg- d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Edit Topik</h5>
          <div class="table-responsive">
            <form action="<?= base_url('admin/materi/topik/proses_edit/' . $topiks['id_topik']); ?>" method="post" onsubmit="updateHiddenTextarea()">
              <div class="mb-3">
                <label for="nama_topik" class="form-label">Judul Topik</label>
                <input type="text" class="form-control" id="nama_topik" name="nama_topik" value="<?= $topiks['nama_topik']; ?>">
              </div>
              <div class="mb-3">
                <label for="penjelasan" class="form-label">Penjelasan</label>
                <textarea class="form-control summernote" id="penjelasan" name="penjelasan" rows="4" cols="50" style="height:100%;"><?= htmlspecialchars($topiks['penjelasan']); ?></textarea>
              </div>
              <div class="mb-3">
                <label for="penjelasan" class="form-label">Code Praktik</label>
                <div class="card">
                  <div class="card-body p-4 mx-auto">
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
                    <div id="editor"><textarea name="editor" id="editor" cols="30" rows="10"><?= $topiks['code']; ?></textarea></div>

                    <iframe></iframe>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body p-0 mx-start">
                  <div class="col-md-6 p-2 justify-content-between" style="width: 100%;">
                    <iframe id="output" sandbox="allow-scripts allow-same-origin" style="flex: 1; width: 100%; border: none;"></iframe>
                  </div>
                </div>
              </div>
              <input type="hidden" name="code" id="code" value="<?= htmlspecialchars($topiks['code']); ?>">
              <input hidden type="text" class="form-control" id="id_materi" name="id_materi" aria-describedby="id_materi" value="<?= $topiks['id_materi']; ?>">
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
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

  btnRun.addEventListener('click', function() { // update the hidden textarea before form submission
    getValueAndDisplay();
  });

  btnLive.addEventListener('change', function() {
    if (btnLive.checked) {
      editor.session.on('change', function(delta) {
        console.log(delta); // update the hidden textarea on live change
        getValueAndDisplay();
      });
    }
  });

  function updateHiddenTextarea() {
    const codeValue = editor.getValue();
    document.getElementById('code').value = codeValue; // update hidden textarea
  }


  function getValueAndDisplay() {
    updateHiddenTextarea();
    const text = editor.getValue();
    iframe.src = 'data:text/html;charset=utf-8,' + encodeURI(text);
  }
</script>


<?= $this->endSection('content'); ?>