<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>ACE in Action</title>
</head>

<body class="font-sans">
    <main class="flex">
        <div class="w-6/12 p-2 h-screen">
            <div class="w-full flex items-center h-20" id="buttons">
                <button id="btnReset" class="text-yellow-700 uppercase p-2 flex items-center border border-yellow-700 rounded-md mr-2">
                    <i class="fa-solid fa-rotate-right fa-2x mr-2"></i>Reset
                </button>
                <button id="btnRun" class="text-green-700 uppercase p-2 flex items-center border border-green-700 rounded-md mr-2">
                    <i class="fa-solid fa-play fa-2x mr-2"></i>Run
                </button>
                <div class="flex items-center border border-blue-700 rounded-md p-2 text-blue-700">
                    <input type="checkbox" id="btnLive" class="mr-1" />
                    <i class="fa-solid fa-clock-rotate-left fa-2x mr-2"></i><span class="uppercase">Live</span>
                </div>
            </div>
            <div class="w-full h-4/6" id="editor"></div>
        </div>
        <div class="w-1 bg-gray-300"></div>
        <div class="w-6/12 p-2 h-full">
            <iframe class="w-full h-80" id="output"></iframe>
        </div>
    </main>

    <!-- load ace -->
    <script src="<?= base_url('assets/ace-builds/src/ace.js') ?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url('assets/ace-builds/src/ext-language_tools.js') ?>"></script>
    <script>
        btnReset = document.getElementById('btnReset');
        btnRun = document.getElementById('btnRun');
        btnLive = document.getElementById('btnLive');
        iframe = document.getElementById('output');

        // trigger editor extensions
        ace.require('ace/ext/language_tools');

        // create editor
        let editor = ace.edit('editor');

        editor.session.setMode('ace/mode/html');
        editor.setTheme('ace/theme/monokai');
        editor.setOptions({
            fontSize: '16pt',
            showLineNumbers: true,
            showGutter: true,
            vScrollBarAlwaysVisible: false,
            enableBasicAutocompletion: true,
            enableSnippets: true,
            enableLiveAutocompletion: true,
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
</body>

</html>