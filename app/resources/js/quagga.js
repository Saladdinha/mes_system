import Quagga from 'quagga'; // ES6

//QuaggaJs

if (document.getElementById('cam') != undefined && document.getElementById('cam') != null) {
    console.log('teste')
    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#cam')
        },
        decoder: {
            readers: ["code_128_reader"]
        }
    }, function (err) {
        if (err) {
            console.log(err);
            return
        }
        console.log("Initialization finished. Ready to start");
        Quagga.start();
    });
}