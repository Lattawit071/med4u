let my_top_scroll = document.getElementById("scroll-top");
window.onscroll = function () {
  scrollFunction();
};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    my_top_scroll.style.display = "block";
  } else {
    my_top_scroll.style.display = "none";
  }
}
my_top_scroll.addEventListener("click", () => {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});
