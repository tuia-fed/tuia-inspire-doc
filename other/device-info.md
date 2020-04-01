# 推啊设备信息接口文档


* [更新记录](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/other/device-info.md#更新记录)
* [接口描述](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/other/device-info.md#接口描述)
* [接口说明](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/other/device-info.md#接口说明)
* [请求参数](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/other/device-info.md#请求参数)
* [响应参数](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/other/device-info.md#响应参数)
* [错误说明](https://github.com/tuia-fed/tuia-inspire-doc/blob/master/other/device-info.md#错误说明)

## 更新记录

| 版本 | 更新内容 |  更新时间  |
| :--: | :------: | :--------: |
| 1.0  |   初稿   | 2020.02.13 |

## 接口描述

媒体可以通过 API 的方式将设备信息推送给推啊，使得广告投放方式更为丰富。

## 接口说明

| 请求地址         | https://activity.tuia.cn/mixloanv/mix/deviceInfo |
| ---------------- | ------------------------------------------------ |
| **请求方式**     | POST                                             |
| **Content-Type** | application/json                                 |

## 请求参数

|   参数名    |  类型  | 是否必填 |            说明            |
| :---------: | :----: | :------: | :------------------------: |
|   appKey    | String |    是    | 媒体信息，媒体后台获取 |
| mediaUserId | String |    是    | 媒体用户id |
| deviceId | String | 是 | 设备ID |
|       idfa      | String | iOS 必填 | 广告标识符 |
|       idfv      | String | iOS 必填 | 应用开发商标识符 |
| imei | String | Android 必填 | Android 设备唯一标识码 |
| oaid | String | Android Q 必填 | 匿名设备标识符 |
| androidId | String | Android 必填 | Android 设备 ID |
| mac | String | 否 | Mac 地址 |
| osType | Integer | 是 | 操作系统类型 1- Android、2- iOS |
| osVersion | String | 是 | 操作系统版本 |
| deviceType | Integer | 否 | 设备类型：1- 手机、2- 平板 |
| vendor | String | 否 | 设备厂商 |
| brand | String | 否 | 手机品牌 |
| model | String | 否 | 设备型号 |
| screenWidth | Integer | 否 | 设备屏幕宽度 |
| screenHeight | Integer | 否 | 设备屏幕高度 |
| ppi | Integer |       否       |                           像素密度                           |
| imsi | String | 否 | imsi |
| operatorType | Integer | 否 | 运营商类型: 0- 未知、1- 中国移动、2- 中国电信、3- 中国联通、99-其他运营商 |
| connectionType | Integer | 否 | 网络类型: 0- 未知网络、2- 2G、3- 3G、4- 4G、5- 5G、100-WIFI、101-ETHERNET、999-NEW_TYPE |
| lat | Double | 否 | 纬度 |
| lon | Double | 否 | 经度 |
| cellularId | String | 否 | 基站ID |

 **请求示例**

```json
{
	"appKey": "3W1hTiugGTa6U95koiXD4NraX5Yy",
	"mediaUserId": "mubai1",
	"imei": "866333026939494",
    "osType": 1,
    "osVersion": "9.0"
}
```


## 响应参数

| 参数名 |  类型  |             说明             |
| :----: | :----: | :--------------------------: |
|  code  | String |            错误码            |
|  desc  | Strig  |           错误信息           |
|  data  |  Boolean  | 更新是否成功 |


**示例**

```json
{
    "code": "0000000",
    "desc": "success",
    "data": true
}
```



## 错误说明



| 错误码  |               说明               |
| :-----: | :------------------------------: |
|    0    |               成功               |
| 0100002 |             参数错误             |
| 0400005 |             更新设备信息失败             |