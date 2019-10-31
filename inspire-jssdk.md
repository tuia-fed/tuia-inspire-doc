#  推啊激励广告JS-SDK对接

## 概述
通过对接激励广告的JS-SDK，媒体可以更加便捷的对接推啊激励互动前端上报部分。

## 使用说明
### 一、确认是否可用
请确保 WebView 支持 ES5 语法，并且支持 iFrame

### 二、引入 JS 文件

在需要初始化 JS 的页面上引入如下 JS 文件，(支持 https): https://yun.duiba.com.cn/h5-mami/inspire/v1.1/inspire.min.js

### 三、通过 init 接口初始化

如果需要使用 JS 的方法，使用的页面必须先初始化，否则将无法调用（请使用合法的有效参数）
```javascript
TAIsdk.init({
  appKey: 'kEzAJT4iRMMag29Z7yWcJGfcVgG',
  slotId: '299012',
  deviceId: '867780021912345',
  userId: '123456',
  rewardCallback: reward,
  closeCallback: close,
  debug: false,
})
```

| 参数名 | 必填 | 类型   | 示例值    | 描述               |
| ------ | :--: | ------ | --------- | ------------------ |
| appKey |  是  | string | 'kEzAJT4iRMMag29Z7yWcJGfcVgG' | 系统分配 （在推啊后台‘我的媒体’获取appkey） |
| slotId |  是  | string | '299012' | 系统分配的广告位Id （ 在推啊后台‘我的广告位’获取slotId） |
| deviceId |  是  | string | '867780021912345' | 设备信息，用于识别用户，提高广告精准投放度，获取不到 IMEI/IDFA 可以传媒体自定义的参数 |
| userId |  是  | string | '123456' | 媒体用户id，奖励发放的对象 |
| rewardCallback |  是  | function | 略 | 上报成功后会执行的回调函数，会将对应上报数据传过来 |
| closeCallback |  否  | function | 略 | 关闭页面后会执行的回调函数 |
| debug |  否  | boolean | false | 是否开启 debug 模式 |

### 三、展示活动

在需要展示激励活动页面的时候，调用 TAIsdk.show()

## 测试链接

http://yun.dui88.com/h5-mami/inspire/test/index.html

