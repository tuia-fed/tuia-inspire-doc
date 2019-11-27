#  推啊媒体API对接文档

* [概述](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#概述)
* [对接价值](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#对接价值)
* [对接流程](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#对接流程)
* [对接原理](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#对接原理)
* [对接步骤](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#对接步骤)
   * [第1步：获取信息](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#第1步获取信息)
   * [第2步：处理参数](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#第2步处理参数)
   * [第3步：生成签名](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#第3步生成签名)
   * [第4步：拼接参数](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#第4步拼接参数)
   * [第5步：活动链接拼接](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#第5步活动链接拼接)
* [示例代码](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#示例代码)
* [特别注意](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/media-api.md#特别注意)


## 概述

API 对接是基于客户端集成的一种对接方式，对接方式简单快捷，开发成本低，无需发版。

## 对接价值

推啊媒体 API 的对接方式简单便捷，对接后对媒体的广告填充、用户体验、媒体收益等环节会有很大提升，后续推啊会逐渐开放更多数据，用于对接媒体的商业化运营。 

1.	**广告填充更充分，投放更精准**：通过流量端与广告端的设备号匹配，有效评估流量质量与偏好，解决广告主因担心流量质量和匹配度不敢投放的问题，广告主可以根据用户偏好推荐更加精准的广告，媒体的广告填充、投放、预算、出价以及转化环节会更好； 
2.	**用户体验更流畅**：在活动和发券环节，通过设备号判断用户唯一性，降低活动和广告券的重复率，保证用户每次进入都有更好更新鲜的参与体验；  
3.	**推啊数据反哺**：逐步向媒体开放用户在推啊链路上产生的行为数据、广告偏好等，帮助媒体构建用户画像，更深刻把握用户属性，助力媒体其他运营环节。

## 对接流程
1. 合作方媒体在推啊媒体平台（ https://ssp.tuia.cn ），注册账号；
2. 创建⼴告位，联系运营配置⼴告活动库，媒体获取投放接口；
3. 客户端开发，集成⼴告位 url，集成方式见对接⽅式；
4. 测试联调，上线运营；
5. 上线之后，可以登录推啊媒体平台查看运营数据、收益数据，进⾏提现等操作。具体详情请对接运营。

## 对接原理
开发者在推啊媒体平台（ https://ssp.tuia.cn ）获取的投放链接在媒体的⼴告位上⼀般为客户端直接集成（如有不同，请单独联系推啊技术），与推啊服务器的交互原理为下图所⽰：

<img src="http://storage.ikyxxs.com/%E5%AA%92%E4%BD%93API%E6%97%B6%E5%BA%8F%E5%9B%BE.png" alt="媒体API时序图" style="zoom: 80%;" />

**说明：**

1.	客户端获取用户设备信息并处理成参数；
2.	合作方调用推啊的投放接口；
3.	推啊返回的活动链接上拼接设备信息及用户 id；
4.	客户端重定向加载推啊活动。

## 对接步骤

### 第1步：获取信息
客户端获取以下表格中的信息，具体信息如下：
1.	所有字段有获取到用户的数据就填⼊，没有获取到⽤户的数据就不填⼊任何数值或字符。不能以 0, - 1.0, 000000 等数值或者其他字符填充。尤其是：imei、idfa、经度、纬度、app 安装列表这些字段。
2.	同一条数据，imei 和 idfa 只能⼀个字段有数值，不能两个都有值。Android ⼿机填⼊ imei 号，iOS ⼿机填⼊ idfa。
3.	传⼊的各字段格式都要正确，例如 imei，idfa 都有固定的格式。请媒体在传入数据前先确认⼀下格式是不是正确。
4.	媒体传入字段值的时候请确认没有出现拼写错误的问题。例如： Android，iOS 等单词不要拼写错误。
5.	api_version 这个字段必填，目前写死 1.0.0，当升级 api 时，需修改版本号。
6.	媒体传入的应用安装列表 apps 字段中，要求传⼊的是⾮系统应⽤的真实 app 安装包名列表。Android 过滤掉系统应⽤的方法为：
```java
// 添加过滤条件过滤掉系统app （系统应⽤：(app.flags & ApplicationInfo.FLAG_SYSTEM) <= 0)）
```



**字段说明**

| 字段名称         | 类型   | 说明                                                         | 是否必填 | 参考格式                                                     | 信息类型        |
| ---------------- | ------ | ------------------------------------------------------------ | -------- | ------------------------------------------------------------ | --------------- |
| imei             | String | Android 必填 TelephonyMana ger.getDeviceId()。 imei 号有3种格式：1. 15位纯数(极少数是14位); 2.  大写或⼩写的a开头的14位数字和字母混合字符(⼀般是⼤写的A开头); 3. md5 加密形式，要求：必须以小写32位的格式加密 | 是       | 868227022234384,  A00000610C10EF                             | 设备信息        |
| idfa             | String | iOS 必填 idfa。 idfa 格式：1. 以 4 个"-"链接的数字和字母的混合字符; 2. md5 加密形式，要求：必须以小写32位的格式加密 | 是       | 8287B2C7-5037-4B6B-A8A3-8BBFE7CDD338                         | 设备信息        |
| device_id        | String | 取 imei 或 idfa，如果都没有取用户唯⼀标识                    | 是       |                                                              |                 |
| api_version      | String | 版本号，写死 1.0.0                                           | 是       | 1.0.0                                                        | API⽂档版本信息 |
| advert_like_type | String | ⽤户历史偏好⼴告(类型)                                       | 否       | DMP标签，ec：电商类，loan：贷款类，game：传奇游戏...         | 用户信息        |
| longitude        | String | GPS坐标经度                                                  | 否       | 118.78                                                       | 设备信息        |
| latitude         | String | GPS坐标纬度                                                  | 否       | 32.04                                                        | 设备信息        |
| os               | String | 操作系统标识： Android / iOS                                 | 否       | Android，iOS                                                 | 设备信息        |
| page_title       | String | 页⾯标题                                                     | 否       | 保险也可以“分期”？巨头觊觎，现⾦贷转战，3万亿新“场景”被抢⾷  | 场景信息        |
| nt               | String | 网络类型: wifi/3G/4G/2G                                      | 否       | wifi、4G、3G、2G                                             | 设备信息        |
| apps             | String | app 安装列表格式：以逗号分隔的每个非系统应⽤的app安装包包名（英⽂字符串） | 否       | com.ss.android.ugc.live,cn.v6.sixrooms,com.zt game.bob,com.nd.android.pandahome2 | 设备信息        |



### 第2步：处理参数

**生成md参数**

将第1步中获取的信息按规范处理成 md 参数，见接口参数，具体方法如下：

对接时把表格中的所有字段转换为 json 字符串，用 gzip 压缩，然后⽤ base64 编码［⾮常重要，请特别注意，base64 使⽤ NO_WRAP 格式，即 base64 后不会有换⾏］，把结果记为 md=$A。json 字符串样例：

```json
{"apps":"android,cn.coupon.kfc,cn.coupon.mac,cn.wps.moffice_eng,com.MobileTicket,com.UCMobile,com.alipay.security.mobile.authenticator,com.android.BBKClock,com.android.BBKCrontab,com.android.BBKPhoneInstructions,com.android.BBKTools,com.android.VideoPlayer,com.android.attachcamera,com.android.backupconfirm,com.android.bbk.lockscreen3","gender":"⼥","idfa":"AEBE52E7-03EE-455A-B3C4-E57283966239","imei":"355065053311001","latitude":"104.07642","longitude":"38.6518","nt":"wifi"}
```

经过 gzip 压缩然后 Base64 编码后为：（请⽤自己代码测试，否则⽆法解析）

```
H4sIAAAAAAAAAGWQwWqDQBCG38VzXNR1TdJbDB5KKeSQ9lrGdTSDuiPrSgilj9Mn6DP1PbomFGp6/L7/H2aY9w CGYQweAjCVZapW2gjN08BGtLX+Qz1c6TyMoue6Jo1vaJqV5l48c0kdHkm36K7iZX9TV4COBriIEfVkyV389BwJ mNwJjSMNju2teLtA5PnTvmPd/pOWjYPyXh9ObPDRjM5O2hGb8b5wZO6W8pUq5EMHF1xuBudAnzT0aGERlKDbad BsarL9MilbMR87aotoZLAKGjQVWv/R788vj1TV4GFX5IVKinUYyaIIU6V2YS73aViodbKR2yxL5HZu90i+LZWK MhUpKeM4imIfdODITRX6MI5SEa2zNJk1m+bXy43IVLzx1jiPZ6op+PgBGf3AE+ABAAA=
```



**投放接口参数说明**

| 接口链接                           | 请求方式 |
| ---------------------------------- | -------------------------------------- |
| /index/serving（媒体后台获取） | GET / POST                             |

**参数描述**

|   字段    |  类型  | 必传 |                             注释                             |                             备注                             |
| :-------: | :----: | :--: | :----------------------------------------------------------: | :----------------------------------------------------------: |
|  appKey   | String |  是  |                           媒体公钥                           |                         投放链接自带                         |
| adslotId  |  Long  |  是  |                          广告位 id                           |                         投放链接自带                         |
|    md     | String |  是  | ⽤户设备信息处理后的参数，在 url 请求时需要 urlencode 避免特殊字符⽆法处理，⽤于签名时不需要进行 urlencode |                                                              |
| timestamp |  Long  |  是  |                         时间戳，毫秒                         |                  System.currentTimeMillis()                  |
|   nonce   |  Long  |  是  |                   随机数（6位），不以0开头                   |                                                              |
| signature | String |  是  |                         sha1 签名串                          | 签名算法见：[http://www.sha1- online.com/sha1- java/](http://www.sha1-online.com/sha1-java/) |
| device_id | String |  是  |            用户设备 ID，Andriod：imei；iOS：idfa             |                                                              |

**返回描述**

| 字段              | 类型   |  注释             | 备注                                             |
| ----------------- | ------ | ---- | ---------------- |
| isimageUrl        | String | 参数选择：0 和 1 | 标识是否使用推啊在线素材，0 表示不使用，1 表示使用 |
| imageUrl          | String |  素材 url         |                                                  |
| activityUrl       | String |    广告位活动链接   |                                                  |
| sckId             | Long   |    素材 id          |                                                  |
| reportExposureUrl | String |     素材曝光上报接口 |                                                  |
| reportClickUrl    | String |   素材点击上报接口 |                                                  |
| extTitle          | String |  素材标题         | 仅当广告位素材类型为图文时回传                   |
| extDesc           | String |  素材描述         | 仅当广告位素材类型为图文时回传                   |

**返回示例**

```json
{
    "code":"0",
    "desc":"成功",
    "data":{
        "activityUrl":"http://engine.tuiadev.cn/index/activity?appKey=4W8ReCvDm4fy3Fpn52MgPgUWmdfS&adslotId=188167&sckId=89",
        "imageUrl":"http://yun.tuitiger.com/mami-media/img/te12j7ui0y.png",
        "sckId":1,
        "reportClickUrl":"http://engine.tuiadev.cn/index/image/log?logType=1&sckId=89&imageLogId=3ea43e957ddd388fc08154ed9e817a01&adslotId=188167&appKey=4W8ReCvDm4fy3Fpn52MgPgUWmdfS",
        "reportExposureUrl":"http://engine.tuiadev.cn/index/image/log?logType=0&sckId=89&imageLogId=3ea43e957ddd388fc08154ed9e817a01&adslotId=188167&appKey=4W8ReCvDm4fy3Fpn52MgPgUWmdfS",
        "extTitle":"【今日有奖】",
        "extDesc":"恭喜您,获得一次抽奖机会呀～"
    }
}
```

**注：投放链接在“媒体后台”，新建广告位后可直接获取。**



### 第3步：生成签名

签名是推啊服务器防止第三⽅恶意使⽤ API 以及保证⽤户设备信息安全进⾏脱敏处理的方式；根据 appSecret、md、timestamp、nonce ⽤ sha1 摘要算法⽣成，具体方法如下：

signature 通过合作方的 appSecret、md、timestamp、nonce 按如下算法⽣成：

1. 将 appSecret 、 md 、 nonce 、 timestamp 四个参数按字典序排序；

2. 将四个参数按 appSecret=?&md=?&nonce=?&timestamp=? 的形式拼接成的字符串进行 sha1 加密； 样例：
```
appSecret=ZaQ5P4sqVD6Gx71n1xWy5ShcaJoCzcEJ5m5gV&md=H4sIAAAAAAAAAGWQwWqDQBCG38VzXNR1TdJbDB5KKeSQ9lrGdTSDuiPrSgilj9Mn6DP1PbomFGp6/L7/H2aY9wCGYQweAjCVZapW2gjN08BGtLX+Qz1c6TyMoue6Jo1vaJqV5l48c0kdHkm36K7iZX9TV4COBriIEfVkyV389BwJmNwJjSMNju2teLtA5PnTvmPd/pOWjYPyXh9ObPDRjM5O2hGb8b5wZO6W8pUq5EMHF1xuBudAnzT0aGERlKDbadBsarL9MilbMR87aotoZLAKGjQVWv/R788vj1TV4GFX5IVKinUYyaIIU6V2YS73aViodbKR2yxL5HZu90i+LZWKMhUpKeM4imIfdODITRX6MI5SEa2zNJk1m+bXy43IVLzx1jiPZ6op+PgBGf3AE+ABAAA=&nonce=238232&timestamp=1513822109890
```
signature 结果为 2c844779cea811c82ef 679d9caa91203a02fc9aa

**特别注意：md 用于签名时要先⽤ gzip 压缩，然后⽤ base64 编码，不要进⾏ url_encode 编码。且 gzip 后返回字节数  组，不要返回字符串**

另：
1. 合作方的 appSecret，登录推啊媒体平台（ https://ssp.tuia.cn ）获取；
2. 验签方式：推啊服务器收到请求后，会自动校验 signature 是否来⾃于授信合作⽅。



### 第4步：拼接参数
将投放接口及广告位接口拼接上对应参数，见接口参数；

样例：

```
https://engine.lvehaisen.com/index/serving?
appKey=3FBAWvDmqkhCdBfbjCXcVHBdVZg7&adslotId=9529&md=H4sIAAAAAAAAAGWQwWqDQBCG38VzXNR1TdJbDB5KKeSQ9lrGdTSDuiPrSgilj9Mn6DP1PbomFGp6%2FL7%2FH2aY9wCGYQweAjCVZapW2gjN08BGtLX%2BQz1c6TyMoue6Jo1vaJqV5l48c0kdHkm36K7iZX9TV4COBriIEfVkyV389BwJmNwJjSMNju2teLtA5PnTvmPd%2FpOWjYPyXh9ObPDRjM5O2hGb8b5wZO6W8pUq5EMHF1xuBudAnzT0aGERlKDbadBsarL9MilbMR87aotoZLAKGjQVWv%2FR788vj1TV4GFX5IVKinUYyaIIU6V2YS73aViodbKR2yxL5HZu90i%2BLZWKMhUpKeM4imIfdODITRX6MI5SEa2zNJk1m%2BbXy43IVLzx1jiPZ6op%2BPgBGf3AE%2BABAAA%3D&nonce=238232&timestamp=1513822109890&signature=2c844779cea811c82ef679d9caa91203a02fc9aa&isimageUrl=1
```

通过这个投放链接获取到活动链接后，按照第5步的参数进行拼接。



###  第5步：活动链接拼接

|   参数    | 是否必填 |  类型  |                 描述                 |
| :-------: | :------: | :----: | :----------------------------------: |
|  appKey   |    是    | String |             活动链接自带             |
| adslotId  |    是    |  Long  |             活动链接自带             |
| device_id |    是    | String | 用户设备ID，Andriod：imei；iOS：idfa |
|  userId   |    是    | String |             用户唯一标识             |

**注：device_id 和 userId 需要合作方拼接；device_id 在获取不到设备号的情况下，可以不填入数值或字符，但禁止以固定字符填充。**



**样例：**

```
https://engine.lvehaisen.com/index/activity?
appKey=3FBAWvDmqkhCdBfbjCXcVHBdVZg7&adslotId=9529&device_id=868227022234384&userId=123456
```



## 示例代码

**Java**

```java
/**
 * Copyright (c) 2019, duiba.com.cn All Rights Reserved.
 */
package com.ysoul.java.utils;

import org.apache.commons.codec.digest.DigestUtils;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.net.URLEncoder;
import java.util.Base64;
import java.util.zip.GZIPOutputStream;

/**
 * 描述: 推啊广告位链接生成
 *
 * @version v1.0
 * @auther guopengfei@duiba.com.cn
 * @date 2019/7/22 09:42
 */
public class SlotUrlUtils {

    public static void main(String[] args) throws IOException {

        String appInfo = "{\"apps\":\"android,cn.coupon.kfc,cn.coupon.mac,cn.wps.moffice_eng,com.MobileTicket,com.UCMobile,com.alipay.security.mobile.authenticator,com.android.BBKClock,com.android.BBKCrontab,com.android.BBKPhoneInstructions,com.android.BBKTools,com.android.VideoPlayer,com.android.attachcamera,com.android.backupconfirm,com.android.bbk.lockscreen3\",\"gender\":\"⼥\",\"idfa\":\"AEBE52E7-03EE-455A-B3C4-E57283966239\",\"imei\":\"355065053311001\",\"latitude\":\"104.07642\",\"longitude\":\"38.6518\",\"nt\":\"wifi\"}";

        String md = Base64.getEncoder().encodeToString(zip(appInfo.getBytes()));

        System.out.println("加密后的md: " + URLEncoder.encode(md, "UTF-8"));

        String appSecret = "3Xg4uQianykSwcopQ8ELzeG4qsm8CRYYqrcKGbn";

        Long timestamp = System.currentTimeMillis();

        String nonce = "123456";

        String appKey = "3GQxGmKh7MwTkRojiFuRF2qPMYAn";

        String slotId = "272367";

        String signatureStr = "appSecret=" + appSecret + "&md=" + md + "&nonce=" + nonce + "&timestamp=" + timestamp;

        String signature = DigestUtils.sha1Hex(signatureStr);

        System.out.println("签名signature: " + DigestUtils.sha1Hex(signature));

        System.out.println("最终链接: " + "https://engine.lvehaisen.com/index/serving?appKey=" + appKey + "&adslotId=" + slotId + "&md=" + URLEncoder.encode(md, "UTF-8") + "&signature=" + signature + "&timestamp=" + timestamp + "&nonce=" + nonce);
    }

    /**
     * zip
     *
     * @param value
     * @return byte[]
     */
    private static byte[] zip(byte[] value) throws IOException {
        if (value == null || value.length == 0) {
            return new byte[0];
        }

        try (ByteArrayOutputStream byteOut = new ByteArrayOutputStream();
             GZIPOutputStream gzipOut = new GZIPOutputStream(byteOut)) {
            gzipOut.write(value);
            gzipOut.finish();
            return byteOut.toByteArray();
        }
    }
}
```
**PHP**

```php
<?php

// 根据实际参数赋值
$timestamp = time() * 1000;
$nonce = "123456";
$app_key = "3GQxGmKh7MwTkRojiFuRF2qPMYAn";
$app_secret = "3Xg4uQianykSwcopQ8ELzeG4qsm8CRYYqrcKGbn";
$slot_id = "272367";
$app_info = "{\"apps\":\"android,cn.coupon.kfc,cn.coupon.mac,cn.wps.moffice_eng,com.MobileTicket,com.UCMobile,com.alipay.security.mobile.authenticator,com.android.BBKClock,com.android.BBKCrontab,com.android.BBKPhoneInstructions,com.android.BBKTools,com.android.VideoPlayer,com.android.attachcamera,com.android.backupconfirm,com.android.bbk.lockscreen3\",\"gender\":\"⼥\",\"idfa\":\"AEBE52E7-03EE-455A-B3C4-E57283966239\",\"imei\":\"355065053311001\",\"latitude\":\"104.07642\",\"longitude\":\"38.6518\",\"nt\":\"wifi\"}";

// 对app信息进行gzip和base64
$md = base64_encode(gzencode($app_info));
//echo '加密后的md: '. urlencode($md);

// sha1签名
$signature_str = 'appSecret='.$app_secret.'&md='.$md.'&nonce='.$nonce.'&timestamp='.$timestamp;
$signature = sha1($signature_str);

// echo "签名signature: ".$signature;

// 生成的最终链接
$url = 'https://engine.lvehaisen.com/index/serving?appKey='.$app_key.'&adslotId='.$slot_id.'&md='.urlencode($md).'&signature='.$signature.'&timestamp='.$timestamp.'&nonce='.$nonce;
header("Location: $url");

?>
```



## 特别注意
不恰当使用推啊媒体接入 API，若存在以下情况，则会被系统⾃动拦截和取消，影响媒体收⼊：

1.	服务器不要代理用户请求，所有请求都应该真实的用户行为；
2.	规定的必填字段请正确传⼊，否则不会返回正确结果；
3.	用户设备信息参数压缩编码处理，是为了节省客户端设备电量以及⽹络流量消耗；
4.	不要压测，推啊的媒体服务器足够强大。

