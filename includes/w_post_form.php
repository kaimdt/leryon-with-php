<div style="width: 60%;" class="login_signup_field comment_field post_form">
  <table class="WritePostUserI">
    <tbody><tr>
      <td style="width:50px;">
        <div class="username_OF_postImg"><?php echo "<img style=\"border-radius: 100px; cursor: pointer;\" src=\"".$MEDIASERVER."grove/".$_SESSION["usid"]."/".$_SESSION["picid"]."/r38-100/photo.jpg"."\" alt=\"".$_SESSION["username"]."\" >"; ?></div>
      </td>
      <td style="padding: 10px 0px">
        <a class="username_OF_post" href="/Neryon">Luca Marquardt</a><br>
        <span class="username_OF_postTime">@Neryon</span>
      </td>
    </tr></tbody></table>
  <form>
    <div style="display: block;">
    <textarea id="textarea" class="postarea" placeholder="Share what's going on with your community"></textarea>
    <div style="position: absolute; right: 20px; bottom: 15px; color: gray; font-family: LeFont;" id="textarea_feedback"></div>
  </div>
    <div class="postarea-button">
      <button>Photo</button>
      <button>GIF</button>
      <button>Umfrage</button>
      <button>Emoji</button>
      <button>Share</button>
    </div>
  </form>
</div>
<script>

$(document).ready(function() {
var text_max = 280;
$('#textarea_feedback').html( + text_max + '/' + text_max);

$('#textarea').keyup(function() {
    var text_length = $('#textarea').val().length;
    var text_remaining = text_max - text_length;

    if (text_remaining < 6) {
      $('#textarea_feedback').html('<span style="color: red;">' + text_remaining + '</span>/' + text_max);
    } else if (text_remaining < 51  && text_remaining > 25) {
      $('#textarea_feedback').html('<span style="color: blue;">' + text_remaining + '</span>/' + text_max);
    } else if (text_remaining < 26  && text_remaining > 5) {
      $('#textarea_feedback').html('<span style="color: orange;">' + text_remaining + '</span>/' + text_max);
    } else {
      $('#textarea_feedback').html(text_remaining + '/' + text_max);
    }
});

});
</script>

<style>
.WritePostUserI {
    width: 100%;
}
table {
    background-color: transparent;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
}
.WritePostUserI td {
    padding: 10px;
}
.WritePostUserI a {
    color: #000;
    font-weight: bold;
    text-decoration: none;
}
.username_OF_post {
  font-weight: 100;
  font-family: "LeFont";
  margin: 0;
  padding: 0;
}
.username_OF_postImg {
    width: 40px;
    height: 40px;
    border-radius: 100%;
    overflow: hidden;
    border: 1px solid rgba(0, 0, 0, 0.1);
}

.username_OF_postTime {
    color: #999;
    font-size: 11px;
    text-decoration: none;
    margin: 0;
    padding: 0;
}
.postarea-button {

}
.postarea {
  border: none;
  outline: none;
  font-size: 17px;
  font-family: "LeFont";
  resize: none;
  min-height: 100px;
  width: 100%;
}
.comment_box{
    padding: 10px;
    margin: 0;
    background: rgba(226, 230, 238, 0.49);
    border-radius: 4px;
}
.comment_box p{
    color: gray;
    font-size: 14px;
    border-bottom: 1px solid rgb(213, 213, 213);
}
.comment_field{
    background: transparent;
    border: none;
    width: 100%;
    min-height: 120px;
    resize: none;
    padding: 10px;
    outline: none;
}
.login_signup_field {
    overflow-y: hidden;
    text-align: left;
    position: relative;
    background: #fff;
    box-shadow: 2px 2px rgba(0, 0, 0, 0.04);
    border-radius: 20px;
}
.comment_time{
    color: #808080;
    font-size: 11px;
}


.emoticonsBox{
    display: none;
    background: #ffffff;
    padding: 5px;
    position: absolute;
    top: 50px;
    max-width: 315px;
    box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.18);
    border-radius: 3px;
    z-index: 1;
    border: 1px solid #e2e2e2;
}
.emoticonsBtn{
    cursor: pointer;
    background: transparent;
    padding: 11px;
    color: #cccccc;
    font-size: 18px !important;
}
.toTopArrow{
    width: 10px;
    height: 10px;
    border-left: 10px solid rgba(0, 0, 0, 0);
    border-right: 10px solid rgba(0, 0, 0, 0);
    border-bottom: 10px solid white;
}
.toBottomArrow{
    width: 10px;
    height: 10px;
    border-left: 10px solid rgba(0, 0, 0, 0);
    border-right: 10px solid rgba(0, 0, 0, 0);
    border-top: 10px solid white;
}
.emojiFace{
    cursor: pointer;
    box-shadow: none;
    width: 30px;
    height: 30px;
    padding: 1px 2px;
    border-radius: 3px;
    background: transparent;
}
.emojiFace:hover,.emojiFace:focus{
    background: #efefef;
}





/* post loading [placeHolder content] */
@keyframes placeHolderShimmer{
    0%{
        background-position: -468px 0
    }
    100%{
        background-position: 468px 0
    }
}

.animated-background {
    animation-duration: 1.3s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: #f6f7f8;
    background: linear-gradient(to right, #eceef3 8%, #ffffff 18%, #eceef3 33%);
    background-size: 800px 104px;
    height: 96px;
    position: relative;
}
.background-masker {
    background: #fff;
    position: absolute;
}

/* Every thing below this is just positioning */

.background-masker.header-top,
.background-masker.header-bottom,
.background-masker.subheader-bottom {
    top: 0;
    left: 40px;
    right: 0;
    height: 10px;
}

.background-masker.header-left,
.background-masker.subheader-left,
.background-masker.header-right,
.background-masker.subheader-right {
    top: 10px;
    left: 40px;
    height: 8px;
    width: 10px;
}

.background-masker.header-bottom {
    top: 18px;
    height: 6px;
}

.background-masker.subheader-left,
.background-masker.subheader-right {
    top: 24px;
    height: 6px;
}


.background-masker.header-right,
.background-masker.subheader-right {
    width: auto;
    left: 200px;
    right: 0;
}

.background-masker.subheader-right {
    left: 130px;
}

.background-masker.subheader-bottom {
    top: 30px;
    height: 10px;
}

.background-masker.content-top,
.background-masker.content-second-line,
.background-masker.content-third-line,
.background-masker.content-second-end,
.background-masker.content-third-end,
.background-masker.content-first-end {
    top: 40px;
    left: 0;
    right: 0;
    height: 6px;
}

.background-masker.content-top {
    height:20px;
}

.background-masker.content-first-end,
.background-masker.content-second-end,
.background-masker.content-third-end{
    width: auto;
    left: 380px;
    right: 0;
    top: 60px;
    height: 8px;
}

.background-masker.content-second-line  {
    top: 68px;
}

.background-masker.content-second-end {
    left: 420px;
    top: 74px;
}

.background-masker.content-third-line {
    top: 82px;
}

.background-masker.content-third-end {
    left: 300px;
    top: 88px;
}
</style>
