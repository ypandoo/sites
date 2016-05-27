'use strict';

describe('myApp.dev module', function() {

  beforeEach(module('myApp.dev'));

  describe('dev controller', function(){

    it('should ....', inject(function($controller) {
      //spec body
      var devCtrl = $controller('devCtrl');
      expect(devCtrl).toBeDefined();
    }));

  });
});