<?php
    class steamApi{
        private $apiKey;
        private $apiUrl;
        private $api;
        private $params;
        
        public function __construct(){
            $this->apiKey = 'B91DDF8AE51233F816868F8F6CB6A46C';
        }
        
        public function setApi($api){
            $this->api = $api;
        }
        
        public function setParams($params){
            $this->params = $params;
        }
        
        public function getApi(){
            return $this->api;
        }
        
        public function getParams(){
            return $this->params;
        }
        
        public function getApiUrl(){
            $params['key'] = $this->apiKey;
            $parameters = http_build_query($this->params);
            
            switch($api){
                case 'GetMatchHistory':
                    $this->apiUrl = 'https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/v001/';
                    break;
                case 'GetMatchDetails':
                    $this->apiUrl = 'https://api.steampowered.com/IDOTA2Match_570/GetMatchDetails/v001/';
                    break;
                case 'GetHeroes':
                    $this->apiUrl = 'https://api.steampowered.com/IEconDOTA2_570/GetHeroes/v0001/';
                    break;
                case 'GetPlayerSummaries':
                    $this->apiUrl = 'https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/';
                    break;
                case 'EconomySchema':
                    $this->apiUrl = 'https://api.steampowered.com/IEconItems_570/GetSchema/v0001/';
                    break;
                case 'GetLeagueListing':
                    $this->apiUrl = 'https://api.steampowered.com/IDOTA2Match_570/GetLeagueListing/v0001/';
                    break;
                case 'GetLiveLeagueGames':
                    $this->apiUrl = 'https://api.steampowered.com/IDOTA2Match_570/GetLiveLeagueGames/v0001/';
                    break;
                case 'GetMatchHistoryBySequenceNum':
                    $this->apiUrl = 'https://api.steampowered.com/IDOTA2Match_570/GetMatchHistoryBySequenceNum/v0001/';
                    break;
                case 'GetTeamInfoByTeamID':
                    $this->apiUrl = 'https://api.steampowered.com/IDOTA2Match_570/GetTeamInfoByTeamID/v001/';
                    break;
            }
            
            $this->apiUrl .= '?' . $parameters;
        }
        
        public function getData(){
            $data = file_get_contents($this->apiUrl);
            return json_decode($data, true);
        }
        
        public function getLobbyTypes($id = null){
            $lobbyTypes = [
                -1 => 'Invalid',
                0 => 'Public matchmaking',
                1 => 'Practice',
                2 => 'Tournament',
                3 => 'Tutorial',
                4 => 'Co-op with bots',
                5 => 'Team match',
                6 => 'Solo Queue',
                7 => 'Ranked',
                8 => 'Solo Mid 1vs1',
            ];
            
            if($id == null){
                return $lobbyTypes;
            }
            else{
                return $lobbyTypes[$id];
            }
        }
        
        public function getRegions($id = null){
            $regions = [
                111 => 'US West',
                112 => 'US West',
                114 => 'US West',
                121 => 'US East',
                122 => 'US East',
                123 => 'US East',
                124 => 'US East',
                131 => 'Europe West',
                132 => 'Europe West',
                133 => 'Europe West',
                134 => 'Europe West',
                135 => 'Europe West',
                136 => 'Europe West',
                142 => 'South Korea',
                143 => 'South Korea',
                151 => 'Southeast Asia',
                152 => 'Southeast Asia',
                153 => 'Southeast Asia',
                161 => 'China',
                163 => 'China',
                171 => 'Australia',
                181 => 'Russia',
                182 => 'Russia',
                183 => 'Russia',
                184 => 'Russia',
                185 => 'Russia',
                186 => 'Russia',
                191 => 'Europe East',
                192 => 'Europe East',
                200 => 'South America',
                202 => 'South America',
                203 => 'South America',
                204 => 'South America',
                211 => 'South Africa',
                212 => 'South Africa',
                213 => 'South Africa',
                221 => 'China',
                222 => 'China',
                223 => 'China',
                224 => 'China',
                225 => 'China',
                231 => 'China',
                242 => 'Chile',
                251 => 'Peru',
                261 => 'India',
            ];
            
            if($id == null){
                return $regions;
            }
            else{
                return $regions[$id];
            }
        }
        
        public function getGameModes($id = null){
            $gameModes = [
                0 => 'Unknown',
                1 => 'All Pick',
                2 => 'Captains Mode',
                3 => 'Random Draft',
                4 => 'Single Draft',
                5 => 'All Random',
                6 => '?? INTRO/DEATH ??',
                7 => 'The Diretide',
                8 => 'Reverse Captains Mode',
                9 => 'Greeviling',
                10 => 'Tutorial',
                11 => 'Mid Only',
                12 => 'Least Played',
                13 => 'New Player Pool',
                14 => 'Compendium Matchmaking',
                15 => 'Custom',
                16 => 'Captains Draft',
                17 => 'Balanced Draft',
                18 => 'Ability Draft',
                19 => '?? Event ??',
                20 => 'All Random Death Match',
                21 => '1vs1 Solo Mid',
                22 => 'Ranked All Pick',
            ];
            
            if($id == null){
                return $gameModes;
            }
            else{
                return $gameModes[$id];
            }
        }
    }
