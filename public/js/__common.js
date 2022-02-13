// Coded by H(S
var prevTime;
var checkTime = 3600 * 1000;
var amountDecimals = [];
var priceDecimals = [];
var balanceDecimals = [];

function number_format (number, decimals, dec_point = '.', thousands_sep = ',') {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
function _number_format(src, decimals) {
    if (decimals == 0) {
        return number_format(src, 0);
    }
    return removeTrailingZero(number_format(src, decimals));
}
function copyStringToClipboard (str) {
    var el = document.createElement('textarea');
    el.value = str;
    el.setAttribute('readonly', '');
    el.style = {position: 'absolute', left: '-9999px'};
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
}

String.prototype.padLeft = function (length, character) {
    return new Array(length - this.length + 1).join(character || '0') + this;
}

function removeTrailingZero(src) {
    var i = src.length - 1;
    for (; i >= 0; i --) {
        if (src[i] == '.' || src[i] != 0) break;
    }
    if (src[i] == '.') {
        return src.substr(0, i);
    }
    return src.substr(0, i + 1);
}

function showToast(msg, title, type) {
    if (type == 'warning') {
        toastr.warning(msg, title, {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            timeOut: 2000
        });
    }
    else if (type == 'success') {
        toastr.success(msg, title, {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            timeOut: 2000
        });
    }
}

$(function() {
    prevTime = 0;
    // getMasterData();
    /*checkNotifications();
    setTimeout(checkNotifications, checkTime);*/
});

function getMasterData() {
    $.ajax({
        url: BASE_URL + 'ajax/common/getBalanceDecimals',
        type: 'POST',
        success: function(result) {
            balanceDecimals = result;
            afterGetMaster();
        },
        error: function(err) {
            console.log(err);
        }
    });
}

function checkNotifications() {
    $.ajax({
        url: (PUBLIC_URL ? PUBLIC_URL : '') + 'ajax/common/getNewNotifications',
        type: 'POST',
        data: {
            'prevTime' : prevTime,
            'staffId' : $('#common-staff-id').val(),
        },
        success: function(result) {
            var count = result['count'];
            var nowTime = result['nowTime'];
            var message;

            if (prevTime != 0) {
                setTimeout(checkNotifications, checkTime);
            }
            prevTime = nowTime;

            if (count == 0) {
                return;
            }
            else if (count == 1) {
                message = count + " unread notification remain!";
            }
            else {
                message = count + " unread notifications remain!";
            }

            showToast(message, "Please confirm!", "info");
        },
        error: function(err) {
            console.log('error :', err);
        }
    });
}

function markNotifications(id, url) {
    $.ajax({
        url: (PUBLIC_URL ? PUBLIC_URL : '') + 'ajax/common/markNotification',
        type: 'POST',
        data: {
            'id': id,
        },
        success: function(result) {
            if (url != '') {
                document.location.href = url;
            }
            else {
                document.location.reload();
            }
        },
        error: function(err) {
            console.log('Error : ', err);
        }
    })
}

function g_exportExcel(tableId, strFileName, strSheetName) {
    $(tableId).table2excel({
        name: strSheetName,
        filename: strFileName //do not include extension
    });
}

function goBack() {
    window.history.back();
}

function showOverlay(obj, flag, text = '') {
    if (flag == true) {
        obj.LoadingOverlay('show', {
            text : text
        });
    }
    else {
        obj.LoadingOverlay('hide');
    }
}

function showAlert(text, type='success', timer = 3000) {
    $('.alert-modal-content').text(text)
    $('#alert-modal').addClass('modal-active');
    $('#alert-modal').addClass('background-' + type);
    setTimeout(function() {
        $('#alert-modal').removeClass('modal-active');
        $('#alert-modal').removeClass('background-' + type);
    }, timer);
}

// $.ajax({
//     url: BASE_URL + 'ajax/save/timezone',
//     type: 'post',
//     data: {
//         timezone: new Date().getTimezoneOffset()
//     }
// });


function isERC20Token(currency) {
    if (currency == 'ETH' || currency == '8CO' || currency == 'USDT-E' || currency == 'ADAE' || currency == 'WCP' ||
        currency == 'JCC') {
        return true;
    }

    return false;
}

function isBinanceToken(currency) {
    if (currency == 'BNB' || currency == 'ADAB' || currency == 'USDT-B') {
        return true;
    }

    return false;
}

function isTronToken(currency) {
    if (currency == 'TRX' || currency == 'USDT-T') {
        return true;
    }

    return false;
}
