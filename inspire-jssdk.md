#  推啊激励互动jssdk对接

## 概述
通过对接激励互动的jssdk，媒体可以更加便捷的对接推啊激励互动前端上报部分。

## 使用说明
> 步骤零：确认是否可用 请确保webview支持ES5语法，并且支持iframe。

> 步骤一：引入 JS 文件

在需要初始化 JS 的页面上引入如下 JS 文件，(支持 https): https://yun.duiba.com.cn/h5-mami/inspire/v1/inspire.min.js

> 步骤二：通过 init 接口初始化

如果需要使用 JS 的方法，使用的页面必须先初始化，否则将无法调用（请使用合法的有效参数）
```javascript
TAIsdk.init({
  appKey: '加密的appid',  //  系统分配 (在推啊后台‘我的媒体’获取appkey)
  slotId: '10000',       //  系统分配的广告位Id (在推啊后台‘我的广告位’获取slotId) 
  userId: 'fgdfgdfg'     //  用户id，用于对接虚拟奖品，确定用户身份
  deviceId: '123456',    //  此信息将有利于我们对于用户的精准识别，从而推荐更优质合适的广告，从而有助于提升媒体收益。
  rewardCallback: reward,//  上报成功后会执行的回调函数，会将对应上报数据传过来
  closeCallback: close,  //  关闭页面后会执行的回调函数
  debug: false,          //  选择是否开启debug模式（默认为false）
  env: 'prod'            //  当前活动所在的环境，（默认为prod，即线上）
})
```

| 参数名 | 必填 | 类型   | 示例值    | 描述               |
| ------ | :--: | ------ | --------- | ------------------ |
| appKey |  是  | string | 'dgfgdf' | 系统分配 （在推啊后台‘我的媒体’获取appkey） |
| slotId |  是  | string | 'dgfgdf' | 系统分配的广告位Id （ 在推啊后台‘我的广告位’获取slotId） |
| deviceId |  是  | string | 'dgfgdf' | 此信息将有利于我们对于用户的精准识别，从而推荐更优质合适的广告，从而有助于提升媒体收益。 |
| userId |  是  | string | 'dgfgdf' | 媒体用户id |
| rewardCallback |  是  | function | 略 | 上报成功后会执行的回调函数，会将对应上报数据传过来 |
| closeCallback |  否  | function | 略 | 关闭页面后会执行的回调函数 |
| debug |  否  | boolean | false | 是否开启debug模式 |
| env |  否  | string | 'prod' | 当前活动所在的环境（默认为prod，即线上）|

> 步骤三：展示激励活动页面

在需要展示激励活动页面的时候，调用TAIsdk.show()