# 激励广告对接文档

* [修订记录](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#修订记录)
* [产品介绍](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#产品介绍)
* [对接流程](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#对接流程)
* [技术对接](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#技术对接)
   * [用户标识接口](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#用户标识接口)
      * [接口概述](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#接口概述)
      * [时序图](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#时序图)
      * [对接文档](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#对接文档)
   * [奖励上报接口](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#奖励上报接口)
      * [接口概述](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#接口概述-1)
      * [时序图](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#时序图-1)
      * [H5前端上报](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#H5前端上报)
      * [客户端上报](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#客户端上报)
      * [服务端上报](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#服务端上报)
      * [签名验证](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#签名验证)
   * [WebView 要求](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#webview-要求)
      * [WebView 基础配置](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#webview-基础配置)
      * [监听 WebView 下载接口](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#监听-webview-下载接口)
      * [实现下载行为](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#实现下载行为)
      * [实现安装行为](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#实现安装行为)
   * [异常场景查询](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#异常场景查询)
      * [可用视频查询接口](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#可用视频查询接口)
* [上线准备](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#上线准备)
* [常见问题](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#常见问题)


## 修订记录

| 编号 |        修订内容        |  修订时间  | 版本 |
| :--: | :--------------------: | :--------: | :--: |
|  1   |          初稿          | 2019.09.01 | 1.0  |
|  2   |   简化媒体 API 对接    | 2019.09.25 | 1.1  |
|  3   | H5 前端上报改为 JS-SDK | 2019.11.05 | 2.0  |



## 产品介绍

**激励互动**

用户通过参与活动获得特定奖励

**激励视频**

用户通过观看视频获得特定奖励

<img src="http://storage.ikyxxs.com/%E6%BF%80%E5%8A%B1%E5%B9%BF%E5%91%8A-%E6%8A%95%E6%94%BE%E6%96%B9%E5%BC%8F.png" alt="激励广告-投放方式" style="zoom:70%;" />

## 对接流程

1. 合作方媒体在推啊媒体平台 (https://ssp.tuia.cn) 注册账号
2. 创建广告位，在后台获取 appKey、appSecret 等参数
3. 客户端开发，集成广告位 url （用户标识接口）
4. 开发奖励上报接口、奖励发放逻辑
5. 测试联调，上线准备
6. 上线运营，之后可以登录推啊媒体平台查看数据

## 技术对接

<img src="http://storage.ikyxxs.com/%E6%BF%80%E5%8A%B1%E5%B9%BF%E5%91%8A%E5%AF%B9%E6%8E%A5%E7%AE%80%E6%98%93%E8%AF%B4%E6%98%8E-2.png" alt="激励广告对接简易说明" style="zoom:80%;" />

### 用户标识接口

#### 接口概述

用于推啊识别用户，并在奖励上报时回传，作为奖励发放的对象。

#### 时序图

<img src="http://storage.ikyxxs.com/%E5%AA%92%E4%BD%93API%E6%97%B6%E5%BA%8F%E5%9B%BE.png" alt="推啊媒体API时序图" style="zoom: 80%;" />

#### 对接文档

[推啊媒体API对接文档](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md)




### 奖励上报接口

#### 接口概述

用户参与活动获得奖励时，推啊会将奖励上报给媒体，用于媒体后续给用户实际发放奖励。

奖励上报需要媒体根据上报类型开发相应的接口。

#### 时序图

<img src="http://storage.ikyxxs.com/%E6%BF%80%E5%8A%B1%E4%BA%92%E5%8A%A8%E6%97%B6%E5%BA%8F%E5%9B%BE.jpg" alt="激励互动时序图" style="zoom:70%;" />

#### H5前端上报

**JS-SDK 更新记录**

| 编号 | 修订内容           | 修订时间   | 版本 |
| ---- | ------------------ | ---------- | ---- |
| 1    | 支持媒体自定义参数 | 2019.11.05 | 1.21 |

**对接流程**

1. 确保 WebView 支持 ES5 语法，并且支持 iFrame。并在需要初始化 JS 的页面上引入如下 JS 文件

   https://yun.duiba.com.cn/h5-mami/inspire/v1.21/inspire.min.js

2. 通过 init 接口初始化。如果需要使用 JS 的方法，使用的页面必须先（使用合法的有效参数）初始化，否则将无法调用

   ```javascript
   TAIsdk.init({
     appKey: 'kEzAJT4iRMMag29Z7yWcJGfcVgG',
     slotId: '299012',
     deviceId: '867780021912345',
     userId: '123456',
     rewardCallback: reward,
     closeCallback: close,
     extParams: {},
     debug: false
   })
   ```

|     参数名     | 必填 |   类型   |            示例值             |                             描述                             |
| :------------: | :--: | :------: | :---------------------------: | :----------------------------------------------------------: |
|     appKey     |  是  |  string  | 'kEzAJT4iRMMag29Z7yWcJGfcVgG' |          系统分配 （推啊后台-我的媒体 获取appkey）           |
|     slotId     |  是  |  string  |           '299012'            |   系统分配的广告位Id （ 推啊后台-我的广告位 获取 slotId）    |
|    deviceId    |  是  |  string  |       '867780021912345'       | 设备信息，用于识别用户，提高广告精准投放度，获取不到 IMEI/IDFA 可以传媒体自定义的参数 |
|     userId     |  是  |  string  |           '123456'            |                 媒体用户 id，奖励发放的对象                  |
| rewardCallback |  是  | function |                               |       上报成功后会执行的回调函数，会将对应上报数据回传       |
| closeCallback  |  否  | function |                               |                  关闭页面后会执行的回调函数                  |
|   extParams    |  否  |  object  |   {'_ext_mediaUnit': '123'}   |    需要拼接在 url 上的额外参数（参数名前缀需要加`_ext_`）    |
|     debug      |  否  | boolean  |             false             |                     是否开启 debug 模式                      |


3. 奖励和关闭回调 function 实现

   ```javascript
   rewardCallback: function(res) {
       console.log(res)
       console.log('奖励上报回调')
       // TODO 奖励上报逻辑
   },
   closeCallback: function() {
       console.log('关闭回调')
       // TODO 页面关闭逻辑
   }
   ```

   res 是一个 Object 包含以下参数

|   参数    |  类型  |     注释     |                             备注                             |
| :-------: | :----: | :----------: | :----------------------------------------------------------: |
|   type    | String | message 类型 |              reward: 发放奖品, close: 关闭窗口               |
|  userId   | String |    用户id    | 奖励发放的对象，来源于广告位链接中的 &userId=xxx，由媒体拼接提供 |
| timestamp | Number |    时间戳    |                                                              |
| prizeFlag | String |   奖励标识   | 默认 "default"。如果媒体需要发放多种奖励，可以根据奖励类型定义不同的奖励标识，并同步给推啊运营配置奖励 |
|  orderId  | String |  推啊订单号  |               每次奖励上报唯一，幂等由媒体保障               |
|  appKey   | String |   媒体公钥   |               用于签名验证，在推啊媒体平台获取               |
|   sign    | String |     签名     | 通过签名验证保障接口调用安全性，签名验证需要媒体后端开发。签名的生成及验证参考《签名验证》章节。 |
|   score   | Number |   奖励倍数   |            翻倍奖励会回传该参数表示用户获得的倍数            |

4. 在需要展示激励活动页面的时候，调用 TAIsdk.show()

5. （可选）在需要修改 url 拼接规则里的参数的时候调用 TAIsdk.updataOpts(options)

   ```javascript
   // options 支持以下几个参数，以对象的形式传入
   // 调用完 TAIsdk.updataOpts(options)，再调用 TAIsdk.show() 即可重新展示激励活动页面。
   
   {
     appKey: 'kEzAJT4iRMMag29Z7yWcJGfcVgG',
     slotId: '299012',
     deviceId: '867780021912345',
     userId: '123456',
     extParams: {'_ext_mediaUnit': '456'}
   }
   ```

6. WebView 需要支持下载和安装，参考 [WebView 要求](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/README.md#webview-要求)

**测试链接**

http://yun.dui88.com/h5-mami/inspire/test/index.html



#### 客户端上报

**对接流程**

1. 对接`用户标识接口`

2. 开发`奖励上报接口`

   在 WebView 内实现 native 方法

3. 进行`奖励发放`

   需要媒体开发 *客户端监听页面关闭请求，媒体发放奖励* 的业务逻辑

**接口说明**

1. 媒体需要在 WebView 内实现 native 方法
   - Android 客户端
     
     `window.TAHandler.reward`: 发放奖励用，会在奖励发放时调用该接口。
     
     `window.TAHandler.close` : 关闭页面用，会在用户点击离开时调用该接口。
   - iOS 客户端
     
     `window.TAHandlerReward` : 发放奖励用，会在奖励发放时调用该接口。
     
     `window.TAHandlerClose` : 关闭页面用，会在用户点击离开时调用该接口。
2. 媒体需要提供奖励标识(prizeFlag) 
3. 如有需要返回按钮需求，前端在调用 `window.TAHandler.close` 或 `window.TAHandlerClose` 的时候关闭 webview

**参数说明**

`window.TAHandler.reward(json)` 或 `window.TAHandlerReward(json)` 仅单个参数，为 JSON 类型，包含以下信息：

|   参数    |  类型   |    注释    |                             备注                             |
| :-------: | :-----: | :--------: | :----------------------------------------------------------: |
|  userId   | String  |   用户id   | 奖励发放的对象，来源于广告位链接中的 &userId=xxx，由媒体拼接提供 |
| timestamp | Number  |   时间戳   |                                                              |
| prizeFlag | String  |  奖励标识  | 用于区分发放的奖励，由媒体定义奖励标识，并同步给推啊运营配置奖励 |
|  orderId  | String  | 推啊订单号 |               每次奖励上报唯一，幂等由媒体保障               |
|  appKey   | String  |  媒体公钥  |               用于签名验证，在推啊媒体平台获取               |
|   sign    | String  |    签名    | 通过签名验证保障接口调用安全性，签名验证需要媒体后端开发。签名的生成及验证参考《签名验证》章节。 |
|   score   | Integer |  奖励倍数  |            翻倍奖励会回传该参数表示用户获得的倍数            |

**测试活动**

[活动链接](https://activity.tuia.cn/activity/index?id=15564&slotId=305733&login=normal&appKey=3zHqTHGuvNp13ckCto2LQiAfyGsi&deviceId=3ddb13cc-42cd-4720-8f9a-17de18de38bd&dsm=1.305733.0.0&dsm2=1.305733.2.15564&tenter=SOW&subActivityWay=1&tck_rid_6c8=0ad0276bjzwmdbm0-7348142&tck_loc_c5d=tactivity-15564&dcm=401.305733.0.0&&tenter=SOW&specialType=0&userType=2&isTestActivityType=0&visType=0&ipUaMd5=49d409192c1b7e9d8410f2c247d5ebcc)

<img src="http://storage.ikyxxs.com/tuia-reward-test-activity.png" alt="tuia-reward-test-activity" style="zoom:50%;" />



**Android 示例代码**

```java
mWebView.addJavascriptInterface(new TAHandler(), "TAHandler");

webSetting.setJavaScriptEnabled(true);
```

<img src="http://storage.ikyxxs.com/tuia-reward-code-android.jpg" alt="tuia-reward-code-android" style="zoom:80%;" />



**Demo**

- [iOS](http://storage.ikyxxs.com/tuia-reward-demo-ios.zip)

- [Android](https://github.com/tuia-fed/Tuia-h5-demo)

- [前端对接](https://activity.tuia.cn/activity/index?id=15564&slotId=305733&login=normal&appKey=3zHqTHGuvNp13ckCto2LQiAfyGsi&deviceId=3ddb13cc-42cd-4720-8f9a-17de18de38bd&dsm=1.305733.0.0&dsm2=1.305733.2.15564&tenter=SOW&subActivityWay=1&tck_rid_6c8=0ad0276bjzwmdbm0-7348142&tck_loc_c5d=tactivity-15564&dcm=401.305733.0.0&&tenter=SOW&specialType=0&userType=2&isTestActivityType=0&visType=0&ipUaMd5=49d409192c1b7e9d8410f2c247d5ebcc&)





#### 服务端上报

**对接流程**

1. 对接`用户标识接口`

2. 开发`奖励上报接口`

   接口要求如下表

3. 进行`奖励发放`

   需要媒体开发 *客户端监听页面关闭请求，媒体发放奖励* 的业务逻辑

**接口说明**

媒体根据要求开发接口，用户获得奖励后，推啊服务器会调用该接口给媒体上报奖励。

<img src="http://storage.ikyxxs.com/%E6%BF%80%E5%8A%B1%E4%BA%92%E5%8A%A8%E5%90%8E%E7%AB%AF%E4%B8%8A%E6%8A%A5%E6%B5%81%E7%A8%8B%E5%9B%BE.jpg" alt="激励互动后端上报流程图" style="zoom: 67%;" />



**接口描述**

| 请求方式 |           Content-Type            |
| :------: | :-------------------------------: |
|   POST   | application/x-www-form-urlencoded |

**参数说明**

|   参数    |  类型   | 必传 |     注释     |                             备注                             |
| :-------: | :-----: | :--: | :----------: | :----------------------------------------------------------: |
|  userId   | String  |  是  |    用户id    | 奖励发放的对象，来源于广告位链接中的 &userId=xxx，由媒体拼接提供 |
| timestamp |  Long   |  是  | 时间戳 |       毫秒                                                       |
| prizeFlag | String  |  是  |   奖励标识   | 用于区分发放的奖励，由媒体定义奖励标识，并同步给推啊运营配置奖励 |
|  orderId  | String  |  是  |  推啊订单号  |               每次奖励上报唯一，幂等由媒体保障               |
|  appKey   | String  |  是  |   媒体公钥   |               用于签名验证，在推啊媒体平台获取               |
|   sign    | String  |  是  |     签名     | 通过签名验证保障接口调用安全性。签名的生成及验证参考《签名验证》章节。 |
|   score   | Integer |  否  |   奖励倍数   |            翻倍奖励会回传该参数表示用户获得的倍数            |

**响应说明**

|  参数   |  类型  | 必传 |                注释                 |           说明           |
| :-----: | :----: | :--: | :---------------------------------: | :----------------------: |
|  code   | String |  是  | "0": 成功，"其他数字": 奖励上报异常 | 该参数必须为 String 类型 |
|   msg   | String |  是  |       奖励上报失败的错误信息        |                          |
| orderId | String |  是  |             推啊订单号              |                          |

**响应示例**

```json
{
  "code": "0",
  "msg": "成功",
  "orderId": "12345678123"
}
```

**超时重试**

奖励上报 2 秒超时无响应时，会进入重试补偿机制，重试间隔策略为 30s、60s、120s，重试次数为 3 次。



#### 签名验证

为了保障接口调用的安全性，防止调用时参数被篡改，媒体接收到奖励上报时，需要先对接口的签名进行验证。以保证请求来自推啊合法的接口调用。

**签名源数据及顺序**
`timestamp`、`prizeFlag`、`orderId`、`appKey`、`appSecret`

`appSecret` 为媒体私钥，通过推啊媒体平台获取

签名算法为 `MD5`

**签名示例代码**

```java
StringBuilder sb = new StringBuilder();
sb.append(timestamp);		//时间戳
sb.append(prizeFlag);		//奖励标识
sb.append(orderId);			//订单号
sb.append(appKey);			//媒体公钥
sb.append(appSecret);		//媒体私钥

try {
    return DigestUtils.md5Hex(sb.toString().getBytes(Charset.forName("UTF-8")));
} catch (NoSuchAlgorithmException | UnsupportedEncodingException e) {
    log.warn("推啊激励奖励上报签名异常 msg={}", e.getMessage(), e);
    return null;
}
```

**验证请求**

请求验证分为时效性验证和签名验证，验证通过再发放奖励

**时效性验证**

```java
Date date = null;

try {
    date = new Date(Long.valueOf(timestamp));
} catch (Exception e) {
    return false;
}

// 5分钟失效
return date.after(new Date(new Date().getTime() - 5 * 60 * 1000L));
```

**签名验证**

```java
签名验证：

StringBuilder sb = new StringBuilder();
sb.append(timestamp);		//时间戳
sb.append(prizeFlag);		//奖励标识
sb.append(orderId);			//订单号
sb.append(appKey);			//媒体公钥
sb.append(appSecret);		//媒体私钥

try {
    String sign = DigestUtils.md5Hex(sb.toString().getBytes(Charset.forName("UTF-8")));
    return Objects.equals(req.getSign(), sign);
} catch (NoSuchAlgorithmException | UnsupportedEncodingException e) {
    log.warn("推啊激励奖励上报签名验证异常 msg={}",e.getMessage(),e);
}

return false;
```

**MD5 依赖包**

```xml
<dependency>
    <groupId>commons-codec</groupId>
    <artifactId>commons-codec</artifactId>
    <version>1.13</version>
</dependency>
```



### WebView 要求

#### WebView 基础配置

```java
WebSettings webSetting = mWebView.getSettings();
webSetting.setJavaScriptEnabled(true);
webSetting.setJavaScriptCanOpenWindowsAutomatically(true);
webSetting.setAllowFileAccess(false);
webSetting.setLayoutAlgorithm(WebSettings.LayoutAlgorithm.NARROW_COLUMNS);
webSetting.setSupportZoom(true);
webSetting.setBuiltInZoomControls(true);
webSetting.setUseWideViewPort(true);
webSetting.setLoadWithOverviewMode(true);
webSetting.setAppCacheEnabled(true);
webSetting.setDatabaseEnabled(true);
webSetting.setDomStorageEnabled(true);
webSetting.setGeolocationEnabled(true);
//必加（不加会影响广告加载）
if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.JELLY_BEAN_MR1) {
    webSetting.setMediaPlaybackRequiresUserGesture(false);
}
webSetting.setAppCacheMaxSize(Long.MAX_VALUE);
webSetting.setPluginState(WebSettings.PluginState.ON_DEMAND);
webSetting.setRenderPriority(WebSettings.RenderPriority.HIGH);
webSetting.setCacheMode(WebSettings.LOAD_DEFAULT);
if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
    webSetting.setMixedContentMode(WebSettings.MIXED_CONTENT_ALWAYS_ALLOW);
}
```

#### 监听 WebView 下载接口

```java
mWebView.setDownloadListener(new DownloadListener() {
    @Override
    public void onDownloadStart(String url, String userAgent, String contentDisposition, String mimetype, long contentLength) {
    }
});
```

#### 实现下载行为

参考 okdownload 下载框架或者自己实现下载器
https://github.com/lingochamp/okdownload/blob/master/README-zh.md

#### 实现安装行为

`适配 Android 7.0 及以上`
**新建 UpdateFileProvider 类继承 FileProvider**

```java
public class UpdateFileProvider extends FileProvider {

}
```

**AndroidManifest.xml 配置 provider**
```xml
<provider
          android:name="com.lechuan.midunovel.view.UpdateFileProvider"
          android:authorities="${applicationId}.updatefileprovider"
          android:exported="false"
          android:grantUriPermissions="true">
  <meta-data
             android:name="android.support.FILE_PROVIDER_PATHS"
             android:resource="@xml/update_cache_path"/>
</provider>
```
**在 xml 文件下新建 update_cache_path.xml**

```xml
<?xml version="1.0" encoding="utf-8"?>
<!--
   ~ Copyright 2016 czy1121
   ~
   ~ Licensed under the Apache License, Version 2.0 (the "License");
   ~ you may not use this file except in compliance with the License.
   ~ You may obtain a copy of the License at
   ~
   ~    http://www.apache.org/licenses/LICENSE-2.0
   ~
   ~ Unless required by applicable law or agreed to in writing, software
   ~ distributed under the License is distributed on an "AS IS" BASIS,
   ~ WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   ~ See the License for the specific language governing permissions and
   ~ limitations under the License.
  -->

<paths xmlns:android="http://schemas.android.com/apk/res/android">
  <external-cache-path name="update_cache" path=""/>
</paths>
```
**下载完成后直接打开下载的文件**
```java
public static void openFile(Context mContext, File f) {
    Intent intent = new Intent();
    intent.setAction(Intent.ACTION_VIEW);
    if (Build.VERSION.SDK_INT < 24) {
        /* 调用getMIMEType()来取得MimeType */
        String type = "application/vnd.android.package-archive";
        /* 设置intent的file与MimeType */
        intent.putExtra(Intent.EXTRA_NOT_UNKNOWN_SOURCE, true);
        intent.putExtra(Intent.EXTRA_RETURN_RESULT, true);
        intent.setDataAndType(Uri.fromFile(f), type);
    } else {
        Uri uri = FileProvider.getUriForFile(mContext, mContext.getPackageName() + ".Updatefileprovider", f);
        intent.setDataAndType(uri, "application/vnd.android.package-archive");
        intent.putExtra(Intent.EXTRA_NOT_UNKNOWN_SOURCE, true);
        intent.putExtra(Intent.EXTRA_RETURN_RESULT, true);
        intent.addFlags(Intent.FLAG_GRANT_READ_URI_PERMISSION);
    }
    intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
    mContext.startActivity(intent);
}
```



### 异常场景查询

#### 可用视频查询接口

**接口描述**

媒体用户是否有可用视频查询接口

**请求URL**

https://ecb.playpangu.com/video/fillAble

**请求方式**

GET

**参数说明**

|   参数   |  类型  | 必传 |      说明      |
| :------: | :----: | :--: | :------------: |
|  appKey  | String |  是  |     用户id     |
|  slotId  |  Long  |  是  |   媒体广告位   |
| deviceId | String |  是  | 用户的设备信息 |
|  userId  | String |  否  |   用户在媒体的唯一识别信息   |
|    ip    | String |  否  |     用户ip     |

**响应说明**
成功返回 ok, 失败无返回

```
ok
```

## 上线准备

- **激励广告上线对接表**

  [点击下载](http://storage.ikyxxs.com/%E6%BF%80%E5%8A%B1%E5%B9%BF%E5%91%8A%E4%B8%8A%E7%BA%BF%E5%AF%B9%E6%8E%A5%E8%A1%A8.docx)，上线前至少提前半天给到推啊，用于奖励配置、素材准备等

## 常见问题

**Q: 怎么获取 appKey、appSecret、prizeFlag 等参数？**

*A: appKey 和 appSecret 在[推啊媒体平台](https://ssp.tuia.cn)获取，prizeFlag 由媒体自己定义并同步给推啊运营。*



**Q: 激励视频与投放接口 /index/serving**

*A:需要配置广告位素材可以对接投放接口；也可以不对接投放接口，通过活动链接直接跳转激励视频*



**Q: 服务端上报需要注意什么**

*A: 媒体自行开发奖励上报接口，奖励上报 url 和 prizeFlag 提供给推啊运营*



**Q: 激励视频需要媒体上报曝光点击数据吗**

*A: 不需要，由我们自行上报*
