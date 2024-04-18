package com.example.demo;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.BeanPropertyRowMapper;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.RowMapper;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class KintaiController {
	@Autowired
	private JdbcTemplate jdbc;
	
	@GetMapping("/")
	public String init(Model model) {
		Syain2 syain2 = new Syain2();
		Kihon kihon = new Kihon();
//		syain2.setSyain_id("");
		model.addAttribute("syain2", syain2);
		model.addAttribute("kihon", kihon);
		return "index";
	}
	
	//社員番号で社員情報を検索
	@PostMapping("/syain")
	public String syainJyoho(@RequestParam("syain_id") int syain_id, Syain syain, Model model) {
		String sql = "SELECT * FROM syain WHERE syain_id = ?";
		if (syain_id >= 1) {
			Object[] args = new Object[] {syain_id};
			RowMapper<Syain> rowMapper = BeanPropertyRowMapper.newInstance(Syain.class);
			syain = jdbc.queryForObject(sql, rowMapper, args);
		} else {
			model.addAttribute("message1", "0は入力できません");
		}
		model.addAttribute("syain", syain);
		return "index";
	}
	
	//社員番号、契約開始日で基本契約情報を検索
	@PostMapping("/kihon")
	public String kihonJyoho(@RequestParam("kihon_id") int kihon_id, Kihon kihon, Model model) {
		String sql = "SELECT * FROM kihon WHERE kihon_id = ?";
		List<Kihon> kihons = null;
		if (kihon_id >= 1) {
			Object[] args = new Object[] {kihon_id};
			RowMapper<Kihon> rowMapper = BeanPropertyRowMapper.newInstance(Kihon.class);
			kihons = jdbc.query(sql, rowMapper, args);
		} 
		model.addAttribute("kihons", kihons);
		return "kihonSelect";
	}
}
