$(function () {
  //全角→半角メソッド
  function toHalfWidth(input) {
    input = input.replace(/０/g, '0');
    input = input.replace(/１/g, '1');
    input = input.replace(/２/g, '2');
    input = input.replace(/３/g, '3');
    input = input.replace(/４/g, '4');
    input = input.replace(/５/g, '5');
    input = input.replace(/６/g, '6');
    input = input.replace(/７/g, '7');
    input = input.replace(/８/g, '8');
    input = input.replace(/９/g, '9');
    input = input.replace(/－/g, '-');
    input = input.replace(/‐/g, '-');
    input = input.replace(/ー/g, '-');
    return input;
  };

  //半角指定の項目は自動で半角変換
  $('#post').on('blur', function (e) {
    $(this).val(toHalfWidth($(this).val()));
  });


});