#  推啊互动广告JS-SDK对接

## 概述
通过在互动广告内对接推啊互动广告JS-SDK，可以将互动广告直接投放于媒体中，变现收益。

## 使用说明

### 一、引入 JS 文件

在需要初始化 JS 的页面上引入如下 JS 文件，(支持 https): https://yun.duiba.com.cn/h5-mami/inspire/v1/inspire-ad.min.js

### 二、调用上报方法

在需要上报的方法里，调用`window.TAIReward()`即可完成上报

举例
```javascript
document.querySelector('.reward').onclick = function() {
  window.TAIReward()   
}
```
