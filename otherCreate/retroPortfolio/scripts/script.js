'use strict';

let kiribanMessage = document.getElementById('kiribanMessage');
let counterDisplay = document.getElementById('counterDisplay');
let kiriban = document.getElementById('kiriban');

// カウンター表示：6桁の数字を1桁ずつdivに書き込む
function setCounterDigits(count) {
    const counter = String(count).padStart(6, '0');
    const digits = counterDisplay.querySelectorAll('.counterDigit');
    digits.forEach(function(div, index) {
        div.textContent = counter[index];
    });
}

// ページの読み込み後にカウンターを回すようにする。
// then使うのはPHPのリクエスト完了までまたせるため
window.onload = function() {
    fetch('includes/counter.php')
        .then(function(response) {
            return response.json();
    })
    .then(function(data) {
        const count = data.count;
        const countPlas = String(count).padStart(6, '0');

        setCounterDigits(count);
            if (count % 10 === 0) {
                kiriban.classList.remove('hidden');
                kiribanMessage.classList.add('hidden');
            } else {
                kiriban.classList.add('hidden');
                kiribanMessage.classList.remove('hidden');
            }
    });
        // リセット収納：risetBoothをクリックでrisetFunctionを開閉する
    const risetBooth = document.getElementById('risetBooth');
    const risetFunction = document.getElementById('risetFunction');
 
    risetBooth.addEventListener('click', function() {
        risetFunction.classList.toggle('isOpen');
    });
};

