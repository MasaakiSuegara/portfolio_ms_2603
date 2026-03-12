'use strict';
    let message  = document.getElementById('messageWindow');
    document.getElementById('cButton').onclick = function () {
        message.textContent += '\n'+ 'カラーナンバー' ;
        const redNum = Math.floor(Math.random() * 256);
        console.log(redNum);
        document.getElementById('redBox').textContent = redNum;

        const greenNum = Math.floor(Math.random() * 256);
        console.log(greenNum);
        document.getElementById('greenBox').textContent = greenNum;

        const blueNum = Math.floor(Math.random() * 256);
        console.log(blueNum);
        document.getElementById('blueBox').textContent = blueNum;

        //透明度の取得
        const opo = document.getElementById("opocity").value;
        // 取得した値をrgbaの形にひとまとめにする
        const rgba = `rgba(${redNum}, ${greenNum}, ${blueNum}, ${opo})`;
        // 枠の背景とメッセージを更新する
        document.getElementById('colorBox').style.backgroundColor =rgba;
        document.getElementById('rgbaCode').textContent = rgba ;
        // ログに入力する
        message.textContent += '\n'+ rgba ;
        // 16進数に書き換えて出力する
        const redHex = redNum.toString(16).padStart(2, '0').toUpperCase();
        const greenHex = greenNum.toString(16).padStart(2, '0').toUpperCase();
        const blueHex = blueNum.toString(16).padStart(2, '0').toUpperCase();
        const hexCode = `#${redHex}${greenHex}${blueHex}`;
        document.getElementById('rgbCode').textContent = hexCode ;
        // ログに入力する
        message.textContent += '\n'+ hexCode ;
    };
    
    document.getElementById('rgbaPaste').onclick = function() {
        const rgbaPaste = document.getElementById('rgbaCode').textContent;
        navigator.clipboard.writeText(rgbaPaste);
    }
    document.getElementById('rgbPaste').onclick = function () {
        const rgbPaste = document.getElementById('rgbCode').textContent;
        navigator.clipboard.writeText(rgbPaste);
    }