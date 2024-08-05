import Quagga from 'quagga'; // ES6

//QuaggaJs

if (document.getElementById('cam') != undefined && document.getElementById('cam') != null) {
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

    Quagga.onDetected(function(result){
        console.log(result.codeResult)
        var barcode = result.codeResult.code
        var splittedBarCode = barcode.split('')
        var serie = `${splittedBarCode[0]}${splittedBarCode[1]}${splittedBarCode[2]}${splittedBarCode[3]}}`
        var product_code = barcode
    })
}