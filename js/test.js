let test = 1;
function action(number) {
    if(document.querySelector(`.test_${number}`)){
        var st = document.querySelector(`.test_${test}`);
        st.style.display='none';
        test=number;
        var st = document.querySelector(`.test_${test}`);
        st.style.display='flex';
        var txt = document.querySelector(`.temp1`);
        txt.textContent = test;
    }
}
$(document).on('click', '.backQuestion', function() {
    action(test-1);
});
$(document).on('click', '.nextQuestion', function() {
    action(test+1);
});