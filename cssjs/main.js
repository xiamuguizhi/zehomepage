//图片懒加载函数封装
function Limg() {
	var viewHeight = document.documentElement.clientHeight // 可视区域的高度
	var t = document.documentElement.scrollTop || document.body.scrollTop;
	var limg = document.querySelectorAll("[loadurl]")
	// Array.prototype.forEach.call()是一种快速的方法访问forEach，并将空数组的this换成想要遍历的list
	Array.prototype.forEach.call(limg, function(item, index) {
		var rect
		if(item.getAttribute("loadurl") === "")
			return
		//getBoundingClientRect用于获取某个元素相对于视窗的位置集合。集合中有top, right, bottom, left等属性。
		rect = item.getBoundingClientRect()
		// 图片一进入可视区，动态加载
		if(rect.bottom >= 0 && rect.top < viewHeight) {
			(function() {
				var img = new Image();
				var qq=item.getAttribute("data-type");

				if(item.nodeName==='IMG'){
				
				if(qq&&qq=="qqtx"){
fetch(item.getAttribute("loadurl")).then(data => data.json()).then(data => {
img.src = data.url;
img.onload = ()=>{
item.src = img.src;
item.classList.add('ojbk');
}
img.onerror= ()=> {
item.src = './img/break.svg';
item.classList.remove('object-cover');
item.classList.add('ojbk','object-contain');
//console.info('加载失败');
}
});
				}else{
				img.src = item.getAttribute("loadurl");
				img.onload = function(){
				item.src = img.src;
				item.classList.add('ojbk');
				}
				img.onerror= ()=> {
				item.src = './img/break.svg';
				item.classList.remove('object-cover');
				item.classList.add('ojbk','object-contain');
				    //console.info('加载失败');
				    }
				}}
				else{if(item.nodeName==='A'||item.nodeName==='DIV'){
				img.src = item.getAttribute("loadurl");
				img.onload = function(){
				item.style.backgroundImage='url("'+img.src+'")';
				item.classList.add('ojbk');
				}
				}
				}


				item.removeAttribute('loadurl')
			})()
		}
	})
}

//文件下载函数，主要用于safari webapp模式
function download(url){
      var filename = url.substring(url.lastIndexOf("/") + 1, url.length);
      var xhr = new XMLHttpRequest();
      xhr.open('GET', url, true);
      xhr.responseType = 'blob';
      xhr.onload = function(e) {
        if (this.status == 200) {
          var myBlob = this.response;
          var link = document.createElement('a');
          link.href = window.URL.createObjectURL(myBlob);
          link.download = filename;
          link.click();
        }
      };
      xhr.send();
}
//时间戳格式化
function formatTime(value) {
    if(value) {
        let date = new Date(value * 1000) // 时间戳为秒：10位数
        //let date = new Date(value)    // 时间戳为毫秒：13位数
        let year = date.getFullYear()
        let month = date.getMonth() + 1 < 10 ? `0${date.getMonth() + 1}` : date.getMonth() + 1
        let day = date.getDate() < 10 ? `0${date.getDate()}` : date.getDate()
        let hour = date.getHours() < 10 ? `0${date.getHours()}` : date.getHours()
        let minute = date.getMinutes() < 10 ? `0${date.getMinutes()}` : date.getMinutes()
        let second = date.getSeconds() < 10 ? `0${date.getSeconds()}` : date.getSeconds()
        return `${year}-${month}-${day} ${hour}:${minute}:${second}`
    } else {
        return ''
    }
}
// 修改网址参数
function replaceParamVal(paramName,replaceWith) {
    var oUrl = this.location.href.toString();
    var re=eval('/('+ paramName+'=)([^&]*)/gi');
    var nUrl = oUrl.replace(re,paramName+'='+replaceWith);
    history.replaceState('','',nUrl);
}
Limg();
document.querySelector("#tuku").onscroll = function(){Limg();}

