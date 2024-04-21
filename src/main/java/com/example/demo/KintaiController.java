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
		Syain syain = new Syain();
		Kihon kihon = new Kihon();
		System.out.println("syain = " + syain);
//		if (syain.getSyain_id() == null) {
//			syain.setSyain_id("");
//			syain.setAge("");
//		}
		System.out.println("syain = " + syain);
		model.addAttribute("syain", syain);
		model.addAttribute("kihon", kihon);
		return "index";
	}
	
	//社員番号で社員情報を検索
	@PostMapping("/syain")
	public String syainJyoho(@RequestParam("syain_id") String syain_id, Syain syain, Kihon kihon, Model model) {
		System.out.println("syain_id = " + syain_id);
		String sql = "SELECT * FROM syain WHERE syain_id = ?";
		if (syain_id.equals("0")) {
			model.addAttribute("message1", "1以上の数字を入力してください。");
		} else if (syain_id.equals("")) {
			model.addAttribute("message1", "1以上の数字を入力してください。");
		} else if (syain_id != null && !syain_id.equals("0") && !syain_id.equals(""))  {
			Object[] args = new Object[] {syain_id};
			RowMapper<Syain> rowMapper = BeanPropertyRowMapper.newInstance(Syain.class);
			syain = jdbc.queryForObject(sql, rowMapper, args);
		}
		System.out.println("syain = " + syain);
		model.addAttribute("syain", syain);
		model.addAttribute("kihon", kihon);
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
