## 推啊 SDK 暴露方法

### SDK Bridge 调用方法
```
nativeSdkBridge(<handlerName: String>, <params: Object>, <errorCallback: Funtion>)
```

#### 调起微信 JF 弹层
`handlerName: showJFDialog()`

### 封装代码
```
function isIOS() {
  var ua = navigator.userAgent.toLowerCase();
  if (ua.match(/iphone/ig) || ua.match(/ipad/ig)) {
    return true;
  } else {
    return false;
  }
}
const nativeSdkBridge = function(handleName, json, errorCb) {
  if (isIOS()) {
    try {
      window.webkit.messageHandlers[handleName].postMessage(json)
    } catch (error) {
      errorCb()
    }
  } else {
    try {
      window.TAHandler && window.TAHandler[handleName] && window.TAHandler[handleName](JSON.stringify(json))
    } catch (error) {
      errorCb()
    }
  }
}

export {
  nativeSdkBridge
}
```
