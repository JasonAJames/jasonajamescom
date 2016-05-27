﻿/**
* Config variables loading and management. Also sets stage and rightclickmenu.
*
* @author	Jeroen Wijering
* @version	1.0
**/


import com.IETVonline.utils.XMLParser;


class com.IETVonline.utils.ConfigManager {


	/** Array with configuration values **/
	private var config:Object;
	/** XML parsing object **/
	private var parser:XMLParser;
	/** cookie parsing object **/
	private var cookie:SharedObject;
	/** do stage setup as well **/
	private var staging:Boolean;
	/** reference to the contextmenu **/
	public var context:ContextMenu;


	/** 
	* Constructor.
	*
	* @param stg	Switch for doing stage setup.
	**/
	function ConfigManager(stg:Boolean) {
		staging = stg;
		if(staging == true) {
			Stage.scaleMode = "noScale";
			Stage.align = "TL";
		}
	};


	/** 
	* Load configuration array.
	*
	* @param def	The object with default values.
	**/
	public function loadConfig(def:Object) {
		config = def;
		config["clip"]._visible = false;
		if(staging == true && Stage.width > 1) {
			config['width']  = Stage.width;
			config['height'] = Stage.height;
			config["clip"]._parent.activity._x = Stage.width/2;
			config["clip"]._parent.activity._y = Stage.height/2;
			config["clip"]._parent.activity._alpha = 100;
		}
		_root['config'] == undefined ? loadCookies(): loadFile();
	};


	/** Load configuration data from external XML file **/
	private function loadFile() {
		var ref = this;
		parser = new XMLParser();
		parser.onComplete = function(obj) {
			var ret = new Object();
			for(var i=0; i<obj.childs.length; i++) {
				ret[obj.childs[i]['name']] = obj.childs[i]['value'];
			}
			ref.checkWrite(ret);
			ref.loadCookies();
		}
		parser.parse(_root['config']);
	};


	/** load configuration data from flashcookies **/
	private function loadCookies() {
		cookie = SharedObject.getLocal("com.IETVonline.players", "/");
		checkWrite(cookie.data);
		loadVars();
	};


	/** Load configuration data from flashvars **/
	private function loadVars() {
		checkWrite(_root);
		if(staging == true) {setContext(); }
		onComplete();
	};


	/** Check if setting exists in defaults and overwrite. **/
	private function checkWrite(dat:Object) {
		for(var cfv in config) {
			if(dat[cfv] != undefined && dat[cfv].indexOf('asfunction') == -1) {
				config[cfv] = unescape(dat[cfv]);
			}
		}
	};


	/** Setup context menu. **/
	private function setContext() {
		var ref = this;
		_root.ref = this;
		context = new ContextMenu();
		context.hideBuiltInItems();
		var itm = new ContextMenuItem("About "+config['abouttxt']+"...",ref.goTo);
		context.customItems.push(itm);
		config["clip"]._parent.menu = context;
	};


	/** Context menu link jump. **/
	public function goTo(obj,itm) {
		getURL(obj.ref.config['aboutlnk'],'_blank');
	};


	/** Event handler for succesfull completion of all parsing **/
	public function onComplete() {};


}