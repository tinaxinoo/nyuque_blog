function resizeImages() {
  // 获取屏幕宽度和图片元素
  var html = document.getElementsByTagName('html')[0];
  var width = html.offsetWidth;
  var screenWidth = width * 0.82;
  var images = document.getElementsByTagName('img');

  // 遍历所有的图片元素,如果图片宽度超过屏幕宽度，则修改宽度
  for (var i = 0; i < images.length; i++) {
    var image = images[i];

    if (image.width > screenWidth) { // 如果图片宽度大于屏幕宽度
      // 计算等比例缩放后的高度
      var height = (screenWidth / image.width) * image.height;

      // 设置图片样式
      image.style.width = screenWidth + 'px';
      image.style.height = height + 'px';
    }
  }
}

// 当文档加载完成时调用 resizeImages 函数
window.addEventListener('load', resizeImages);

//把p的font-size修改为1.4em
var elements = document.getElementsByClassName('ne-text');
for (var i = 0; i < elements.length; i++) {
  elements[i].style.fontSize = '1.4em';
}

//修改pre(代码块)的字体为sans-serif
var preElements = document.getElementsByTagName('pre');
for (var i = 0; i < preElements.length; i++) {
  preElements[i].style.fontFamily = "sans-serif";
}

//解决换行问题
// 选择所有class为"ne-text"的span元素
var spans = document.querySelectorAll('span.ne-text');

// 循环遍历每个元素
for (var i = 0; i < spans.length; i++) {

  // 获取innerHTML属性值
  var html = spans[i].innerHTML;

  // 如果html包含"&lt;br&gt;"标签，则进行替换
  if (html.includes('&lt;br&gt;')) {

    // 使用正则表达式将"&lt;br&gt;"替换为"<br>"
    html = html.replace(/&lt;br&gt;/g, '<br>');

    // 更新元素的innerHTML属性
    spans[i].innerHTML = html;
  }
}


////////////////////////////////////////////
//把h1到下一个h1中的元素移入一个新的div中
////////////////////////////////////////////
// 获取 <div class="lake-content"> 元素
const lakeContent = document.querySelector('.lake-content');

// 获取所有的 <h1> 元素
const headings = lakeContent.querySelectorAll('h1');

// 循环处理每个 <h1> 元素
for (let i = 0; i < headings.length; i++) {
  const currentHeading = headings[i];
  const nextHeading = getNextHeading(currentHeading);

  // 创建一个包含当前 <h1> 元素和下一个 <h1> 元素之间所有内容的 <div> 元素
  const contentDiv = document.createElement('div');
  contentDiv.classList.add(`section-${i}`); // 添加一个 class 名称，名称为 section-（数字），用于区分不同的新 div
  let currentNode = currentHeading.nextSibling;

  while (currentNode && currentNode !== nextHeading) {
    const nextNode = currentNode.nextSibling;
    if (nextNode === null && currentNode.nodeType === Node.TEXT_NODE && currentNode.textContent.trim() === '') {
      break;
    }
    contentDiv.appendChild(currentNode);
    currentNode = nextNode;
  }

  // 将新的 <div> 元素插入到当前 <h1> 元素和下一个 <h1> 元素之间
  if (nextHeading && nextHeading.parentNode === lakeContent) {
    lakeContent.insertBefore(contentDiv, nextHeading);
  } else {
    lakeContent.appendChild(contentDiv);
  }
}

// 获取下一个标题元素，这里仅针对 <h1> 元素
function getNextHeading(currentHeading) {
  let node = currentHeading.nextSibling;

  while (node) {
    if (node.tagName && node.tagName.toLowerCase() === 'h1') {
      return node;
    }
    node = node.nextSibling;
  }

  return null;
}

/////////////////////////////////////
//实现h1折叠
/////////////////////////////////////
// 获取所有具有 'lake-content' 类的元素
const contentElements = document.querySelectorAll('.lake-content');

// 循环处理每个具有 'lake-content' 类的元素
for (let i = 0; i < contentElements.length; i++) {
  const lakeContent = contentElements[i];

  // 获取当前元素内所有的 <h1> 元素
  const headings = lakeContent.querySelectorAll('h1');

  // 循环处理每个 <h1> 元素
  for (let j = 0; j < headings.length; j++) {
    const currentHeading = headings[j];
    const nextDiv = getNextDiv(currentHeading);

    // 监听 <h1> 元素的点击事件
    currentHeading.addEventListener('click', function () {
      // 切换下一个 <div> 元素的可见性
      if (nextDiv) {
        nextDiv.style.display = nextDiv.style.display === 'none' ? 'block' : 'none';
      }
    });
  }
}

// 获取下一个 <div> 元素，这里仅针对当前 <h1> 元素下的 <div> 元素
function getNextDiv(currentHeading) {
  let node = currentHeading.nextSibling;

  while (node) {
    if (node.tagName && node.tagName.toLowerCase() === 'div') {
      return node;
    }
    node = node.nextSibling;
  }

  return null;
}