package com.example.demo;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.BeanPropertyRowMapper;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.RowMapper;
import org.springframework.jdbc.core.namedparam.BeanPropertySqlParameterSource;
import org.springframework.jdbc.core.namedparam.MapSqlParameterSource;
import org.springframework.jdbc.core.namedparam.NamedParameterJdbcTemplate;
import org.springframework.jdbc.core.namedparam.SqlParameterSource;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

@RequestMapping("/")
@Controller
public class KintaiController {
	@Autowired
	private JdbcTemplate jdbc;
	@Autowired
	private NamedParameterJdbcTemplate npJdbc;
	
	@GetMapping("/")
	public String init(Model model) {
		Syain syain = new Syain();
		Kihon kihon = new Kihon();
		model.addAttribute("syain", syain);
		model.addAttribute("kihon", kihon);
		return "index";
	}
	
	//社員番号で社員情報を検索
	@PostMapping("/syain")
	public String syainJyoho(@RequestParam("syain_id") String syain_id
			, @Validated Syain syain, BindingResult bindingResult, Kihon kihon, Model model) {
		if (syain_id.equals("1") || syain_id.equals("2")){
			String sql = "SELECT * FROM syain WHERE syain_id = ?";
			if (bindingResult.hasErrors()) {
				return "index";
			}
			Object[] args = new Object[] {syain_id};
			RowMapper<Syain> rowMapper = BeanPropertyRowMapper.newInstance(Syain.class);
			syain = jdbc.queryForObject(sql, rowMapper, args);
			model.addAttribute("syain", syain);
			model.addAttribute("kihon", kihon);
			return "index";
		} else {
			model.addAttribute("message1", "社員番号は1、または2を選択してください。");
			model.addAttribute("syain", syain);
			model.addAttribute("kihon", kihon);
			return "index";
		}
	}
	
	//社員番号で基本契約情報（一覧）を検索
	@PostMapping("/kihon")
	public String kihonJyoho(@RequestParam("syain_id") int syain_id, Kihon kihon, Model model) {
		String sql = "SELECT * FROM kihon WHERE kihon_id = ?";
		List<Kihon> kihons = null;
		System.out.println("syain_id = " + syain_id);
		if (syain_id == 1 || syain_id == 2) {
			Object[] args = new Object[] {syain_id};
			RowMapper<Kihon> rowMapper = BeanPropertyRowMapper.newInstance(Kihon.class);
			kihons = jdbc.query(sql, rowMapper, args);
		} else {
			Syain syain = new Syain();
			kihon = new Kihon();
			model.addAttribute("message1", "社員番号は1、または2を選択してください。");
			model.addAttribute("syain", syain);
			model.addAttribute("kihon", kihon);
			return "index";
		}
		System.out.println("kihons = " + kihons);
		String name = "";
		for (int i = 0; i < 1; i++) {
			kihon = kihons.get(0);
			name = kihon.getKihon_name();
		}
		model.addAttribute("kihons", kihons);
		model.addAttribute("kihon_id", syain_id);
		model.addAttribute("kihon_name", name);
		return "kihonSelect";
	}
	
	//基本契約情報選択画面から新規登録入力画面に遷移する。
	@GetMapping("/register")
	public String register(@RequestParam("kihon_id") int kihon_id, Kihon kihon, Model model) {
		String sql = "SELECT * FROM syain WHERE syain_id = ?";
		String kihon_id_str = String.valueOf(kihon_id);
		Object[] args = new Object[] {kihon_id_str};
		RowMapper<Syain> rowMapper = BeanPropertyRowMapper.newInstance(Syain.class);
		Syain syain = jdbc.queryForObject(sql, rowMapper, args);
		String name = syain.getName();
		model.addAttribute("kihon_id", kihon_id);
		model.addAttribute("kihon", kihon);
		model.addAttribute("name", name);
		return "register";
	}
	
	//新規登録入力画面から新規登録確認画面に遷移する。
	@PostMapping("/registerConfirm")
	public String registerConfirm(@Validated @ModelAttribute Kihon kihon, BindingResult bindingResult
			, @RequestParam("kihon_id") int kihon_id, Model model) {
		String sql = "SELECT * FROM syain WHERE syain_id = ?";
		String kihon_id_str = String.valueOf(kihon_id);
		Object[] args = new Object[] {kihon_id_str};
		RowMapper<Syain> rowMapper = BeanPropertyRowMapper.newInstance(Syain.class);
		Syain syain = jdbc.queryForObject(sql, rowMapper, args);
		String name = syain.getName();
		kihon.setKihon_name(name);
		model.addAttribute("kihon", kihon);
		model.addAttribute("kihon_id", kihon_id);
		model.addAttribute("name", name);
		if (bindingResult.hasErrors()) {
			return "register";
		}
		return "registerConfirm";
	}
	
	//新規登録確認画面から新規登録処理を行う
	@PostMapping("/registerProcessing")
	public String registerProcessing(@ModelAttribute Kihon kihon, @RequestParam("number") int number, 
			@RequestParam("kihon_id") int kihon_id, @RequestParam("kihon_name") String kihon_name, Syain syain, Model model) {
		String sql = "INSERT INTO kihon(kihon_id, kihon_name, mei_st, mei_ed, kinmu_st, hiru_tm, kinmu_ed, hiru_st, hiru_ed"
				+ ", teiji_st, teiji_ed, teiji_tm, yoru_st, yoru_ed, yoru_tm, kizami, number)"
				+ "VALUES(:kihon_id, :kihon_name, :mei_st, :mei_ed, :kinmu_st, :hiru_tm, :kinmu_ed, :hiru_st, :hiru_ed"
				+ ", :teiji_st, :teiji_ed, :teiji_tm, :yoru_st, :yoru_ed, :yoru_tm, :kizami, :number)";
		MapSqlParameterSource mapSql = new MapSqlParameterSource();
		mapSql.addValue("kihon_id", kihon.getKihon_id());
		mapSql.addValue("kihon_name", kihon_name);
		mapSql.addValue("mei_st", kihon.getMei_st());
		mapSql.addValue("mei_ed", kihon.getMei_ed());
		mapSql.addValue("kinmu_st", kihon.getKinmu_st());
		mapSql.addValue("hiru_tm", kihon.getHiru_tm());
		mapSql.addValue("kinmu_ed", kihon.getKinmu_ed());
		mapSql.addValue("hiru_st", kihon.getHiru_st());
		mapSql.addValue("hiru_ed", kihon.getHiru_ed());
		mapSql.addValue("teiji_st", kihon.getTeiji_st());
		mapSql.addValue("teiji_ed", kihon.getTeiji_ed());
		mapSql.addValue("teiji_tm", kihon.getTeiji_tm());
		mapSql.addValue("yoru_st", kihon.getYoru_st());
		mapSql.addValue("yoru_ed", kihon.getYoru_ed());
		mapSql.addValue("yoru_tm", kihon.getYoru_tm());
		mapSql.addValue("kizami", kihon.getKizami());
		mapSql.addValue("number", kihon.getNumber());
		
		SqlParameterSource paramSource = new BeanPropertySqlParameterSource(kihon);
		int done = npJdbc.update(sql, paramSource);
		if (done != 0) {
			model.addAttribute("kihon_name", kihon_name);
			model.addAttribute("kihon", kihon);
			model.addAttribute("message1", "新規登録処理が完了しました。");
			return "index";
		} else {
			model.addAttribute("kihon_name", kihon_name);
			model.addAttribute("kihon", kihon);
			model.addAttribute("message", "新規登録処理ができませんでした。");
			return "index";
		}
	}
	
	//基本契約情報選択画面から更新入力画面に遷移する。
	@PostMapping("/update")
	public String update(@RequestParam("number") int number, Kihon kihon, Model model) {
		System.out.println("number = " + number);
		String sql = "SELECT * FROM kihon WHERE number = ?";
		Object[] args = new Object[] {number};
		RowMapper<Kihon> rowMapper = BeanPropertyRowMapper.newInstance(Kihon.class);
		kihon = jdbc.queryForObject(sql, rowMapper, args);
		model.addAttribute("kihon", kihon);
		return "update";
	}
	//更新入力画面から更新確認画面に遷移する。
	@PostMapping("/updateConfirm")
	public String updateConfirm(@ModelAttribute Kihon kihon, @RequestParam("number") int number, 
			@RequestParam("kihon_id") int kihon_id, @RequestParam("name") String name, Model model) {
		System.out.println("name = " + name);
		kihon.setKihon_name(name);
		model.addAttribute("kihon", kihon);
		return "updateConfirm";
	}
	//更新確認画面から更新処理を行う
	@PostMapping("/updateProcessing")
	public String updateProcessing(@ModelAttribute Kihon kihon, @RequestParam("number") int number, 
			@RequestParam("kihon_id") int kihon_id, @RequestParam("kihon_name") String kihon_name, Syain syain, Model model) {
		String sql = "UPDATE kihon SET mei_st = :mei_st, mei_ed = :mei_ed, kinmu_st = :kinmu_st"
				+ ", hiru_tm = :hiru_tm, kinmu_ed = :kinmu_ed, hiru_st = :hiru_st, hiru_ed = :hiru_ed"
				+ ", teiji_st = :teiji_st, teiji_ed = :teiji_ed, teiji_tm = :teiji_tm, yoru_st = :yoru_st"
				+ ", yoru_ed = :yoru_ed, yoru_tm = :yoru_tm, kizami = :kizami WHERE number = :number";
		
		MapSqlParameterSource mapSql = new MapSqlParameterSource();
		mapSql.addValue("mei_st", kihon.getMei_st());
		mapSql.addValue("mei_ed", kihon.getMei_ed());
		mapSql.addValue("kinmu_st", kihon.getKinmu_st());
		mapSql.addValue("hiru_tm", kihon.getHiru_tm());
		mapSql.addValue("kinmu_ed", kihon.getKinmu_ed());
		mapSql.addValue("hiru_st", kihon.getHiru_st());
		mapSql.addValue("hiru_ed", kihon.getHiru_ed());
		mapSql.addValue("teiji_st", kihon.getTeiji_st());
		mapSql.addValue("teiji_ed", kihon.getTeiji_ed());
		mapSql.addValue("teiji_tm", kihon.getTeiji_tm());
		mapSql.addValue("yoru_st", kihon.getYoru_st());
		mapSql.addValue("yoru_ed", kihon.getYoru_ed());
		mapSql.addValue("yoru_tm", kihon.getYoru_tm());
		mapSql.addValue("kizami", kihon.getKizami());
		
		SqlParameterSource paramSource = new BeanPropertySqlParameterSource(kihon);
		int done = npJdbc.update(sql, paramSource);
		if (done != 0) {
			model.addAttribute("kihon", kihon);
			model.addAttribute("message1", "更新処理が完了しました。");
			return "index";
		} else {
			model.addAttribute("kihon", kihon);
			model.addAttribute("message", "更新処理ができませんでした。");
			return "index";
		}
	}
	
	//基本契約情報選択画面から削除確認画面に遷移する。
	@PostMapping("/deleteConfirm")
	public String deleteConfirm(@RequestParam("number") int number, Kihon kihon, Model model) {
		String sql = "SELECT * FROM kihon WHERE number = ?";
		Object[] args = new Object[] {number};
		RowMapper<Kihon> rowMapper = BeanPropertyRowMapper.newInstance(Kihon.class);
		kihon = jdbc.queryForObject(sql, rowMapper, args);
		model.addAttribute("kihon", kihon);
		return "deleteConfirm";
	}
	
	//基本契約情報選択画面から削除確認画面に遷移する。
	@PostMapping("/deleteProcessing")
	public String deleteProcessing(@RequestParam("number") int number, Kihon kihon, Syain syain, Model model) {
		String sql = "DELETE FROM kihon WHERE number = :number";
		SqlParameterSource param = new MapSqlParameterSource()
				.addValue("number", number);
		int done = npJdbc.update(sql, param);
		if (done != 0) {
			model.addAttribute("kihon", kihon);
			model.addAttribute("syain", syain);
			model.addAttribute("message1", "削除処理が完了しました。");
			return "index";
		} else {
			model.addAttribute("kihon", kihon);
			model.addAttribute("syain", syain);
			model.addAttribute("message1", "削除処理ができませんでした。");
			return "index";
		}
	}
	//キャンセルボタンを押した時、トップページに画面遷移する。
	@GetMapping("/canselTop")
	public String canselTop(Model model) {
		Syain syain = new Syain();
		Kihon kihon = new Kihon();
		model.addAttribute("syain", syain);
		model.addAttribute("kihon", kihon);
		return "index";
	}
	//キャンセルボタンを押した時、トップページに画面遷移する。
	@GetMapping("/canselSelect")
	public String canselSelect(@RequestParam("kihon_id") int kihon_id
			, @RequestParam("name") String name, Kihon kihon, Model model) {
		String sql = "SELECT * FROM kihon WHERE kihon_id = ?";
		List<Kihon> kihons = null;
		if (kihon_id >= 1) {
			Object[] args = new Object[] {kihon_id};
			RowMapper<Kihon> rowMapper = BeanPropertyRowMapper.newInstance(Kihon.class);
			kihons = jdbc.query(sql, rowMapper, args);
		} 
		model.addAttribute("kihons", kihons);
		model.addAttribute("kihon_id", kihon_id);
		model.addAttribute("kihon_name", name);
		return "kihonSelect";
	}
}
