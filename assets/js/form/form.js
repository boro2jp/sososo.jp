
function formErrorAppear() {
    // エラーの数を取得
    const errorElm = document.querySelectorAll(".error");

    if (errorElm.length > 0) {
        //　表示するエラーの要素を作成
        errorElm[0].id = "errorTarget";
        const createErrorElm = document.createElement('div');
        const errorElemText = document.createTextNode(`入力エラーが${errorElm.length}件あります`);

        const createtargetElm = document.createElement('a');
        const targetElemText = document.createTextNode(`エラーに移動する▼`);

        createtargetElm.href = "#errorTarget";
        createtargetElm.appendChild(targetElemText);

        createErrorElm.appendChild(errorElemText);
        createErrorElm.appendChild(createtargetElm);

        createErrorElm.classList.add("error-notice");

        const parentElm = document.querySelector(".article-header"); // 要素を追加する親要素
        const titleElm = document.querySelector(".entry-title");// この要素の前に追加
        parentElm.insertBefore(createErrorElm, titleElm);

    }
}

document.addEventListener("DOMContentLoaded", function() {
    // カレントURL
    const currrentURL = location.href;
    // フォームのページだけ実行
    if (currrentURL.indexOf(/mw-wp-form-error/) > 0 ) {
        formErrorAppear();
    }
});
