import { configure } from 'enzyme';
import Adapter from 'enzyme-adapter-react-16';
require('angular/angular.js');
require('angular-mocks/angular-mocks.js');

configure({ adapter: new Adapter() });

global.testResetAngular = () => {
	jest.resetModules()
	angular.mock.module('materia')
	angular.module('materia', [])
}

global.resetNamespace = () => {
	if (window["Materia"]) {
		window["Materia"] = null
	}
}

global.API_LINK = '/api/'
global.BASE_URL = 'https://test_base_url.com/'
global.WIDGET_URL = 'https://localhost/widget/'
global.WIDGET_HEIGHT = ''
global.WIDGET_WIDTH = ''
global.DEMO_ID = 'XxSgi'
global.STATIC_CROSSDOMAIN = 'https://crossdomain.com/'
global.UPLOAD_ENABLED = true
global.MEDIA_URL = 'https://mediaurl.com/'
global.getMockApiData = (type) => {
	return require(`./__test__/mockapi/${type}.json`)
}

beforeEach(() => { testResetAngular(); resetNamespace(); });
