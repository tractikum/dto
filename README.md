Tractikum DTO
===============

Requirements
------------

* PHP (8.1+)

Usage
-----

Create ``Tractikum\DTO\Services\ClickService\Campaign\CampaignDTO`` from default data
```php
use Tractikum\DTO\Services\ClickService\Campaign\CampaignDTO;

CampaignDTO::createDefault()->getAttributes();
```
Create ``Tractikum\DTO\Services\Tracker\Campaign\CampaignDTO`` data
```php
use Tractikum\DTO\Services\Tracker\Campaign\CampaignDTO;
use Tractikum\DTO\Services\Tracker\Campaign\GroupCollectionDTO;

CampaignDTO::create(
    name: 'US Campaign',
    guid: 'some-guid',
    type: CampaignType::Path,
    groups: GroupCollectionDTO::createDefault()
)->getAttributes();
```
Create ``Tractikum\DTO\Services\ClickService\Campaign\CampaignDTO`` from detailed data
```php
use Tractikum\DTO\Services\ClickService\Campaign\CampaignDTO;
use Tractikum\DTO\Services\ClickService\Campaign\CampaignRuleDTO;
use Tractikum\DTO\Services\ClickService\Campaign\CampaignRuleCollectionDTO;
use Tractikum\DTO\Services\Tracker\TrafficSource\TrafficSourceDTO;
use Tractikum\DTO\Services\Tracker\TrafficSource\TrafficSourceParamDTO;
use Tractikum\DTO\Services\Tracker\TrafficSource\TrafficSourceParamCollectionDTO;

CampaignDTO::create(
    workspace_id: 1,
    campaign_guid: 'some-guid',
    rules: CampaignRuleCollectionDTO::create([
        CampaignRuleDTO::create(k: "a", p: "d", v: ["g"], ie: true),
        CampaignRuleDTO::create(k: "b", p: "e", v: ["h"], ie: true),
        CampaignRuleDTO::create(k: "c", p: "f", v: ["i"], ie: true),
    ]),
    traffic_source: TrafficSourceDTO::create(
        id: 1,
        params: TrafficSourceParamCollectionDTO::create([
            TrafficSourceParamDTO::create(token: "token1", ts_param: "ts_param1", ts_token: "ts_token1"),
            TrafficSourceParamDTO::create(token: "token2", ts_param: "ts_param2", ts_token: "ts_token2"),
            TrafficSourceParamDTO::create(token: "token3", ts_param: "ts_param3", ts_token: "ts_token3"),
        ]),
        postback: 'test/postback'
    ),
)->getAttributes();
```