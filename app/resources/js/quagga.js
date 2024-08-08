import Quagga from 'quagga'; // ES6

//QuaggaJs

if (document.getElementById('cam') != undefined && document.getElementById('cam') != null) {
    var readers = []
    readers.push($("#scan_readers").val())
    $(".preview_cam").show(200)
    initQuaggaJs()
    onDetectQuaggaJs()

    $("#start_scan").on('click', function () {
        var readers = []
        readers.push($("#scan_readers").val())
        console.log(readers)
        initQuaggaJs(readers)
        $(".preview_cam").show(200)
    })

}

function initQuaggaJs(scan_readers) {
    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#cam')
        },
        decoder: {
            readers: scan_readers
        }
    }, function (err) {
        if (err) {
            console.log(err);
            return
        }
        console.log("Initialization finished. Ready to start");

        Quagga.start();
        onDetectQuaggaJs()
    });
}
function onDetectQuaggaJs() {
    Quagga.onDetected(function (result) {
        // 8 validade 8 lote 4 peso liquido 4 serie
        var bar_code = result.codeResult.code
        var splittedBarCode = bar_code.split('')
        var product_code = `${splittedBarCode[0]}${splittedBarCode[1]}${splittedBarCode[2]}${splittedBarCode[3]}`
        var allotment = `${splittedBarCode[12]}${splittedBarCode[13]}${splittedBarCode[14]}${splittedBarCode[15]}${splittedBarCode[16]}${splittedBarCode[17]}${splittedBarCode[18]}${splittedBarCode[19]}`
        var validity = `${splittedBarCode[4]}${splittedBarCode[5]}${splittedBarCode[6]}${splittedBarCode[7]}${splittedBarCode[8]}${splittedBarCode[9]}${splittedBarCode[10]}${splittedBarCode[11]}`
        var liquid_weight = `${splittedBarCode[20]}${splittedBarCode[21]}${splittedBarCode[22]}${splittedBarCode[23]}${splittedBarCode[24]}`
        console.log('product_code: ' + product_code)
        console.log('allotment: ' + allotment)
        console.log('validity: ' + validity)
        console.log('liquid_weight: ' + liquid_weight)
        $('#bar_code').val(bar_code)
        $('#product_code').val(product_code)
        $('#allotment').val(allotment)
        $('#validity').val(validity)
        $('#liquid_weight').val(liquid_weight)
        Quagga.offProcessed();
        Quagga.offDetected()
        Quagga.stop();
        $(".preview_cam").hide(200)
    })
}