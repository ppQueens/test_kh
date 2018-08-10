

$(function(){
    $("#upload_link").on('click', function(e){
        e.preventDefault();
        $("#upload:hidden").trigger('click');
    });
});


function hex(buffer) {
    var hexCodes = [];
    var view = new DataView(buffer);
    for (var i = 0; i < view.byteLength; i += 4) {
        // Using getUint32 reduces the number of iterations needed (we process 4 bytes each time)
        var value = view.getUint32(i);
        // toString(16) will give the hex representation of the number without padding
        var stringValue = value.toString(16);
        // We use concatenation and slice for padding
        var padding = '00000000';
        var paddedValue = (padding + stringValue).slice(-padding.length);
        hexCodes.push(paddedValue);
    }

    // Join all the hex strings into one
    return hexCodes.join("");
}

function sha256(str) {
    // We transform the string into an arraybuffer.
    var buffer = new TextEncoder("utf-8").encode(str);
    return crypto.subtle.digest("SHA-256", buffer).then(function (hash) {
        return hex(hash);
    });
}

function send_with_ajax(data, url, func,type="POST") {
    $.ajax({
        url: url,
        data: data,
        type: type,
        dataType: 'text',
        success: func,
        error: function () {
            console.log("error")
        }
    });

}

//шифрование пароля на клиенте
// $(document).on("submit", "#reg_form", function (event) {
//     event.preventDefault();
//
//     var arr = $(event.target).serializeArray();
//     $.each(arr, function(key, value) {
//       if (value.name === "password" || value.name === "password2" ){
//           sha256(value.value).then(function(digest) {
//               value.value = digest;
//           });
//       }
//     });
//
//     function send() {
//         send_with_ajax(arr,"/registration",function (response) {
//             console.log("RESPONSE");
//             $("html").html(response);
//
//         })
//     }
//     setTimeout(send,1000);
//
//     console.log(arr);
//
// });