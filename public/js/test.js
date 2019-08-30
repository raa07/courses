
function outf(text) {
    let mypre = document.getElementById("output");

    text = processOutput(text);

    mypre.innerHTML = mypre.innerHTML + text;
}

function builtinRead(x) {
    if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined)
        throw "File not found: '" + x + "'";
    return Sk.builtinFiles["files"][x];
}

function runit() {
    let prog = document.getElementById("yourcode").value;

    prog = processCode(prog);

    let mypre = document.getElementById("output");
    mypre.innerHTML = '';
    Sk.pre = "output";
    Sk.configure({output:outf, read:builtinRead});
    let myPromise = Sk.misceval.asyncToPromise(function() {
        return Sk.importMainWithBody("<stdin>", false, prog, true);
    });
}

function processCode(prog) {
    return resultFuncDef + prog + resultParams + resultTest;
}

function processOutput(output) {

    let find = output.match(/\*result\*(\d)\*result\*/);

    if (find) {
        let result = find[1];

        if (result === '1') {
            done();
        } else {
            notDone();
        }
        output = output.replace(/\*result\*(\d)\*result\*/, '');
    }


    return output;
}


function done() {
    console.log('eee');
}

function notDone() {
    console.log('noooo');
}
