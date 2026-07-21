=== UniConsent Cookie Consent CMP - 同意管理器 ===
Version: 1.7.1
Contributors: uniconsent
Tags: cmp, cookie横幅, cookie同意, iab, cookie
Requires at least: 4.0
Tested up to: 6.8.3
Requires PHP: 7.4
Stable tag: 1.7.1
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
领先的同意管理平台，支持 IAB TCF、GPP、GDPR、POPIA、CCPA、COPPA 和 LGPD 合规。

== Description ==

[UniConsent](https://www.uniconsent.com/) 是领先的同意管理平台（CMP），帮助网站遵守全球隐私法规，包括 [GDPR](https://www.uniconsent.com/gdpr)、[CCPA/CPRA](https://www.uniconsent.com/ccpa)、COPPA、[LGPD](https://www.uniconsent.com/lgpd)、PIPL、POPIA 和 [PDPA](https://www.uniconsent.com/pdpa)。

= 认证 =

* **经认证的 EU IAB TCF 2.3 CMP**
* **经认证的 Canada IAB TCF CMP**
* **经认证的 Google Consent Mode CMP（Gold Tier）**

= 功能 =

* 11 种横幅样式，带可视预览 — Bottom Sheet、Floating Card、Dark Compact、Popup 等
* Google Consent Mode v2
* Microsoft UET 和 Bing Ads Consent Mode
* IAB GPP 1.1 同意信号
* EU IAB TCF 2.3、TCF Canada、CCPA USP 和美国各州同意信号
* 隐私徽章显示/隐藏选项
* GEO 地理定位 — 仅向特定地区的访客显示同意横幅
* 支持 52+ 种语言
* 兼容 WP Consent API
* 支持 Google Ad Manager、Google AdX、Google AdSense、Prebid.js、Amazon APS、Facebook Pixel、LinkedIn Pixel 等

= 使用方法 =

安装并激活插件，选择您的横幅样式，启用 GDPR 和/或 CCPA 合规，然后保存。同意横幅会自动出现在您的网站上 — 无需编写代码。

如需高级功能（如自定义 CSS、同意分析、Cookie 扫描和同意日志记录），请在 [uniconsent.com](https://www.uniconsent.com/) 注册免费许可证密钥。

关注 [数据隐私监管科技新闻](https://www.uniconsent.com/blog) 获取最新资讯。

== Installation ==

本节介绍如何安装插件并使其运行。

1. 将 `uniconsent-cmp` 上传到 `/wp-content/plugins/` 目录
2. 通过 WordPress 中的"插件"菜单激活插件
3. 导航到 UniConsent 管理页面并配置您的设置：输入您的许可证密钥或更改配置。

== Frequently Asked Questions ==

= 什么是 GDPR？ =

大多数在欧盟开展业务的公司都了解《通用数据保护条例》（GDPR），该条例于 2018 年 5 月 25 日生效。

违规的组织将面临高额罚款：每次违规 2000 万欧元或全球收入的 4%。对于大型公司来说，这可能意味着数百万甚至数十亿美元的罚款。

GDPR 适用于任何处理欧盟公民个人数据的企业，无论其是否位于欧盟。

= 什么是 GDPR 同意和 CMP？

同意应通过明确的肯定行为给出，表明数据主体自由给予的、具体的、知情的和明确的同意处理其个人数据，例如通过书面声明（包括电子方式）或口头声明。这可能包括在访问网站时勾选复选框、为信息社会服务选择技术设置或其他明确表示数据主体在此背景下接受对其个人数据进行拟议处理的声明或行为。

CMP 是企业用来收集和存储客户同意使用哪些数据及其用途的技术基础设施。

= UniConsent 是经 IAB EU 批准的 CMP 吗？

是的，UniConsent 是经 IAB 批准的同意管理提供商。

注意：激活此插件并不保证您完全符合 GDPR。请联系 GDPR 顾问或律师事务所评估必要措施。

= UniConsent 或同意管理提供商（CMP）解决方案如何运作？ =

UniConsent 或任何其他经 IAB 批准的同意管理提供商（CMP）为发布商和广告商提供一种机制，以获取同意，然后控制哪些第三方供应商可以请求同意来跟踪其网站和应用程序的用户。

= UniConsent 与其他 CMP 有什么区别？

* 11 种横幅样式，带可视预览卡片
* GEO 地理定位 — 仅在特定地区显示同意横幅
* 经认证的 IAB TCF 2.3 和 Google Consent Mode CMP
* 支持 IAB 供应商、Google GAM 供应商和自定义供应商
* Google Consent Mode v2 和 Microsoft UET Consent Mode
* 52+ 种语言
* 高选择加入率，对广告收入影响最小
* 支持 Cookie ePrivacy 同意

= 这个 CMP 解决方案免费吗？

是的，WordPress 插件无需许可证密钥即可使用所有核心功能，包括 IAB TCF 2.3、Google Consent Mode v2、11 种横幅样式和 52+ 种语言。在 [uniconsent.com](https://www.uniconsent.com/) 注册免费许可证密钥，即可解锁高级功能，如自定义 CSS、同意分析、Cookie 扫描和同意日志记录。

= 你们提供高级计划吗？

是的。高级计划包括：

* 自定义横幅文本、翻译和 CSS 样式
* 同意率分析面板
* 网站 Cookie 发现和披露
* JavaScript 和 Cookie 阻止
* ConsentDB 同意日志记录
* 第一方 CMP 域名
* 优先支持

请访问：[UniConsent 同意管理器](https://www.uniconsent.com)

== Screenshots ==

1. UniConsent – 第一阶段：初始弹窗页面。
2. UniConsent – 第二阶段：目的同意页面。
3. UniConsent – 第三阶段：IAB TCF 供应商同意页面。
4. UniConsent – 第四阶段：自定义供应商同意页面。
5. UniConsent – 第五阶段：Cookie 列表页面。
6. UniConsent – 第六阶段：初始横幅页面。

== Changelog ==

= 1.7.1 =
* 发布商国家/地区设置，用于 IAB TCF publisherCountryCode

= 1.7.0 =
* 11 种可视横幅样式，带预览卡片
* 显示或隐藏隐私徽章的选项
* 支持 52+ 种语言

= 1.6.4 =
* 改进界面

= 1.6.1 =
* 改进

= 1.6.0 =
* 支持 WP Consent API

= 1.5.7 =
* 修复 PHP 8.2+ 警告

= 1.5.6 =
* Microsoft UET Consent Mode
* Google Consent Mode 2.0
* IAB GPP 1.1 合规

= 1.5.5 =
* 优化和改进

= 1.5.3 =
* 改进 Google Consent Mode

= 1.5.2 =
* 改进 Consent Mode 并支持 40 种语言

= 1.5.1 =
* 改进 GPP API

= 1.5.0 =
* 改进 Google Consent Mode V2 默认状态

= 1.4.9 =
* 改进 GPP 同意性能
* 改进 Google Consent Mode v2

= 1.4.8 =
* 改进 Consent Mode
* 改进标签加载

= 1.4.7 =
* 支持 IAB GPP 1.1

= 1.4.6 =
* 支持 IAB TCF 2.2

= 1.4.5 =
* 安全增强和修复

= 1.4.2 =
* GPP 同意信号
* TCF Canada 同意信号

= 1.3.11 =
* 优化同意率性能。

= 1.3.8 =
* 支持简单模式和性能更新。

= 1.3.1 =
* 支持更多语言。

= 1.3.0 =
* 添加 IAB TCF 1.1 通知。

= 1.2.12 =
* 启用 IAB TCF 2.0。

= 1.2.11 =
* 支持 Google Ad Manager 同意。

= 1.2.10 =
* 性能更新。

= 1.2.8 =
* 添加 UniConsent v2。

= 1.2.5 =
* 添加 CCPA。

= 1.2.4 =
* 修复错误。

= 1.2.0 =
* 性能改进。

= 1.1.29 =
* 修复错误。

= 1.1.27 =
* 添加荷兰语支持。

= 1.1.26 =
* 加载第三方标签和 GTM。

= 1.1.25 =
* 优化性能

= 1.1.22 =
* 支持许可证密钥

= 1.1.13 =
* 测试 WordPress 5.0

= 1.1.12 =
* 修复错误。

= 1.1.10 =
* 更新 readme。

= 1.1.7 =
* 更新版本。

= 1.1.6 =
* 已更新。

= 1.1.4 =
* 添加同意 Logo。

= 1.1.3 =
* 10 万用户免费。

= 1.1.0 =
* 性能升级。

= 1.0.9 =
* 优化 JS 标签。

= 1.0.8 =
* 更新 stub。

= 1.0.6 =
* 支持多种语言。

= 1.0.4 =
* 添加横幅或弹窗样式选择。

= 1.0.0 =
* 插件首次发布
