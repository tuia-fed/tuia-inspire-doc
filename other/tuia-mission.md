# 推啊任务对接文档

[TOC]

## 更新记录

| 版本 |                更新内容                 |  更新时间  |
| :--: | :-------------------------------------: | :--------: |
| 1.0  |                  初稿                   | 2020.01.11 |
| 1.1  |            支持额外参数回传             | 2020.01.14 |
| 1.2  | businessId 改为透传的 businessType 参数 | 2020.01.19 |

## 对接说明

推啊通过 H5 链接的方式接入合作方的内容/活动等，推啊会在链接上拼接参数，合作方需要根据该文档对接推啊提供的回调接口，并透传链接上拼接的参数。

<img src="http://storage.ikyxxs.com/%E6%8E%A8%E5%95%8A%E4%BB%BB%E5%8A%A1%E6%97%B6%E5%BA%8F%E5%9B%BE.png" alt="推啊任务时序图" style="zoom:80%;" />

## 透传参数

推啊会在合作方链接上拼接以下参数，需要合作方接收并在上报时回传

|      字段名      |  类型   |     说明     |
| :--------------: | :-----: | :----------: |
|    tuiaUserId    | String  |   推啊用户   |
| tuiaBusinessType | Integer | 推啊业务类型 |
|   tuiaAppToken   | String  | 推啊应用信息 |
|     tuiaExt      | String  | 推啊补充参数 |

## 接口说明

| 请求地址         | https://activity.tuia.cn/mixloanv/mix/thirdParty/rewardCallback |
| ---------------- | ------------------------------------------------------------ |
| **请求方式**     | POST                                                         |
| **Content-Type** | application/json                                             |

## 请求参数

|  参数   |  类型  | 是否必填 |                   说明                   |
| :-------: | :----: | :------: | :--------------------------------------: |
| requestId | String |    是    | 请求ID，合作方自定义，推啊用于幂等性处理 |
|  tuiaUserId  | String |    是    |        推啊用户ID，推啊会拼接在合作方链接上       |
|  tuiaBusinessType  | Integer |    是    |       推啊业务类型，推啊会拼接在合作方链接上 |
|  tuiaAppToken  | String |    是    |        推啊应用信息，推啊会拼接在合作方链接上     |
|  tuiaExt  | String |    是    |        推啊补充参数，推啊会拼接在合作方链接上       |
| point | Integer | 是 | 积分，默认传 1 |
| timestamp |  Long  |    是    |          用于签名的时间戳，毫秒          |
|   sign    | String |    是    |         签名，32位小写，MD5(requestId + tuiaUserId  + tuiaBusinessType + point + timestamp)         |
| ext | JSONObject | 否 | 额外参数 |

**ext 参数说明**

|   参数    |  类型   |               说明                |
| :-------: | :-----: | :-------------------------------: |
|    id     | String  | 合作方自定义，用于区分内容/游戏等 |
| startTime |  Long   |      开始时间的时间戳，毫秒       |
|  endTime  |  Long   |      结束时间的时间戳，毫秒       |
| duration  | Integer |           时长，非必传            |



 **请求示例**

```json
{
	"requestId": "tuia-12345678",
	"tuiaUserId": "MQ==",
	"tuiaBusinessType": "1",
	"tuiaAppToken": "MTIzNDU2",
	"tuiaExt": "",
	"point": 1,
	"timestamp": 1571205208590,
	"sign": "38aa811134576d0c9fe73d2f68e300d4",
    "ext": {
        "id": "1",
        "startTime": 1579000079258,
        "endTime": 1579000089258,
        "duration": 10
    }
}
```


## 响应参数

| 参数名 |  类型  |   说明   |
| :----: | :----: | :------: |
|  code  | String |  错误码  |
|  desc  | Strig  | 错误信息 |



**示例**

```json
{
    "code": "0000000",
    "desc": "success"
}
```



## 错误说明



| 错误码  |               说明               |
| :-----: | :------------------------------: |
|    0000000    |                成功                  |
|  0402001 | 时间戳校验失败  |
|  0402002 | 签名校验失败  |
|  0402003 | 用户校验失败  |
|  0402004 | token 校验失败 |
|  0402005 | 超过收益上限  |
|  0402006 | 重复请求  |