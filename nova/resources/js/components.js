import Vue from 'vue';

import Icon from './components/Icon.vue';
import Icon2 from './components/Icon2.vue';
import Rank from './components/Rank.vue';
import Flash from './components/Flash.vue';
import Avatar from './components/Avatar.vue';
// import RankPicker from './components/RankPicker.vue'
// import UserPicker from './components/UserPicker.vue'
import MediaManager from './components/MediaManager.vue';
// import PositionPicker from './components/PositionPicker.vue'
// import CharacterPicker from './components/CharacterPicker.vue'
import PositionAvailable from './components/PositionAvailable.vue';

import TextInput from './components/forms/TextInput.vue';

import TextBlock from './components/forms/TextBlock.vue';

import Toggle from './components/forms/Toggle.vue';

import Switch from './components/forms/Switch.vue';

import PageHeader from './components/PageHeader.vue';

import Card from './components/Card.vue';
// Vue.component('rank-picker', Vue.extend(RankPicker))
// Vue.component('user-picker', Vue.extend(UserPicker))
// Vue.component('position-picker', Vue.extend(PositionPicker))
// Vue.component('character-picker', Vue.extend(CharacterPicker))

// import NovaPicker from './components/forms/Picker.vue'
// Vue.component('nova-picker', Vue.extend(NovaPicker))

// import RankPicker from './components/forms/RankPicker.vue'
// Vue.component('rank-picker', Vue.extend(RankPicker))

import Dropdown from './components/Dropdown.vue';

import PickList from './components/forms/Picker.vue';

import LayoutPicker from './components/LayoutPicker.vue';

import PassportClients from './components/passport/Clients.vue';

import PassportAuthorizedClients from './components/passport/AuthorizedClients.vue';

import PassportPersonalAccessTokens from './components/passport/PersonalAccessTokens.vue';

Vue.component('text-input', Vue.extend(TextInput));
Vue.component('text-block', Vue.extend(TextBlock));
Vue.component('toggle', Vue.extend(Toggle));
Vue.component('toggle-switch', Vue.extend(Switch));
Vue.component('page-header', Vue.extend(PageHeader));
Vue.component('app-card', Vue.extend(Card));

Vue.component('rank', Vue.extend(Rank));
Vue.component('flash', Vue.extend(Flash));
Vue.component('avatar', Vue.extend(Avatar));
Vue.component('media-manager', Vue.extend(MediaManager));
Vue.component('position-available', Vue.extend(PositionAvailable));
Vue.component('icon', Vue.extend(Icon));
Vue.component('nova-dropdown', Dropdown);
Vue.component('pick-list', Vue.extend(PickList));

Vue.component('mobile-view', require('./components/responsive-mobile').default);
Vue.component('tablet-view', require('./components/responsive-tablet').default);
Vue.component('desktop-view', require('./components/responsive-desktop').default);

Vue.component('layout-picker', Vue.extend(LayoutPicker));
Vue.component('passport-clients', Vue.extend(PassportClients));
Vue.component('passport-authorized-clients', Vue.extend(PassportAuthorizedClients));
Vue.component('passport-personal-access-tokens', Vue.extend(PassportPersonalAccessTokens));

Vue.component('icon-r', Vue.extend(Icon2));